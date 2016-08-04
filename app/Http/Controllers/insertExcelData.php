<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;

use BackDoor\Http\Requests;
use BackDoor\TestData as testdata;
use Excel;

class insertExcelData extends Controller
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

        Excel::load('Backdoor.xlsx', function($reader) {

            $reader->each(function($sheet) {

                //Loop through all rows
                $dataSet = [];
                foreach ($sheet as $data) {

                    $Member = !empty($data->member) ? $data->member : '';
                    $Reference = !empty($data->bet_reference) ? $data->bet_reference : '';
                    $Game = !empty($data->game) ? $data->game : '';

                    $dataSet[] = [
                        'Member' => $Member,
                        'Reference' => $Reference,
                        'Game' => $Game
                    ];
            }
                testdata::insert($dataSet);
            });
        });

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
