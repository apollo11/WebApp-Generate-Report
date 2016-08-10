<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;

use BackDoor\Http\Requests;
use BackDoor\file as file;
use BackDoor\WinLoss as WinLoss;
use Excel;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadDir = public_path() . '/upload/excel_files/';
        $tempPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileBasename = substr($fileName, 0, strripos($fileName, '.')); // get file extension;
        $fileExt = substr($fileName, strripos($fileName, '.')); // get file name
        $fileSize = $_FILES['file']['size'];
        $allowed_file_types = array('.xlsx', '.xls');

        $boolIsSuccess = true;
        $arrData = array();
        $strMessage = '';


        if (in_array($fileExt, $allowed_file_types) && ($fileSize < 200000)) {

            /**
             * Rename file
             */

            $this->fileName = md5($fileBasename) . $fileExt;

            if (file_exists($uploadDir . $this->fileName)) {
                return response()->json(['error' => 'file already exist']);
            } else {

                /**
                 * Move uploaded file
                 */
                move_uploaded_file($tempPath, $uploadDir . $this->fileName);

                /**
                 * Save file data
                 */
                $file = new File;
                $file->name = $this->fileName;
                $file->type = $_FILES['file']['type'];
                $file->size = $fileSize;
                $file->real_path = $uploadDir . $this->fileName;

                if ($file->save()) {
                    // save excel content
                    Excel::load($file->real_path, function ($reader) {
                        $reader->each(function ($sheet) {

                            // loop through all rows
                            foreach ($sheet as $data) {

                                // check if data is valid by checking member
                                if ('' != $data->member) {

                                    $winLoss = new WinLoss;
                                    $winLoss->member = $data->member;
                                    $winLoss->bet_reference = (int)$data->bet_reference;
                                    $winLoss->bet_time = $data->bet_time;
                                    $winLoss->datetime = $data->dateandtime;
                                    $winLoss->table_number = $data->table_number;
                                    $winLoss->game = $data->game;
                                    $winLoss->effective_bet_amount = $data->effective_bet_amount;
                                    $winLoss->win_loss = $data->win_loss;
                                    $winLoss->casino_win_loss = $data->casinowinloss;
                                    $winLoss->balance = $data->balance;
                                    $winLoss->ip = $data->bet_ip;
                                    $winLoss->dealer = $data->dealer;
                                    $winLoss->month = $data->month;
                                    $winLoss->shuffling_method = $data->shuffling_method;
                                    $winLoss->file_name = $this->fileName;


                                    // save data
                                    $winLoss->save();
                                }
                            }
                        });
                    });
                    $arrData = $file;
                } else {
                    $boolIsSuccess = false;
                    $strMessage = 'Something went wrong while saving, please try again.';
                }
            }
        } elseif ($fileSize > 200000) {
            $boolIsSuccess = false;
            $strMessage = 'Entity too large!';
        } else {
            $boolIsSuccess = false;
            $strMessage = implode(', ', $allowed_file_types);
        }

        return $this->createJsonResponse($boolIsSuccess, $arrData, $strMessage);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id = null)
    {
        // check type parameter
        switch (strtolower($type)) {
            // specific file
            case 'file':
                if (null != $id) {
                    $data = File::find($id);
                } else {
                    $data = File::all();
                }
                break;

            // file content
            case 'content':
                if (null != $id) {
                    $data = WinLoss::find($id);
                } else {
                    $data = WinLoss::all();
                }
                break;
        }

        return $this->createJsonResponse(true, $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
