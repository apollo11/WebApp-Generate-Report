<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;

use BackDoor\Http\Requests;
use BackDoor\file as file;

class WinLossController extends Controller
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
   * @param  \Illuminate\Http\Request $request
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


    if (in_array($fileExt, $allowed_file_types) && ($fileSize < 200000)) {

      /**
       * Rename file
       */
      $renameFileName = md5($fileBasename) . $fileExt;

      if (file_exists($uploadDir . $renameFileName)) {

        return response()->json(['error' => 'file already exist']);

      } else {

        /**
         * Move uploaded file
         */
        move_uploaded_file($tempPath, $uploadDir . $renameFileName);

        /**
         * Save file data
         */
        $data = new File;
        $data->name = $renameFileName;
        $data->type = $_FILES['file']['type'];
        $data->size = $fileSize;
        $data->real_path = $uploadDir . $renameFileName;

        if ($data->save()) {

          return $this->createJsonResponse(true, $data);

        } else {

          return $this->createJsonResponse(true);
        }
      }
    } elseif ($fileSize > 200000) {

      return response()->json(['error' => 'Entity too large']);

    } else {

      return response()->json(['error' => implode(', ', $allowed_file_types)]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id = null)
  {

    if (null != $id) {
      $files = File::find($id);
    } else {
      $files = File::all();
    }

    return $this->createJsonResponse(true, $files);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
