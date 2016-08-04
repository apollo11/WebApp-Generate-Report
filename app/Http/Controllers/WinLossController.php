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
        $uploadDir = public_path().'/upload/excel_files/';
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);
        $tempPath = $_FILES['file']['tmp_name'];

        if (move_uploaded_file($tempPath, $uploadFile)) {

            $data = new File;
            $data->name = $_FILES['file']['name'];
            $data->type = $_FILES['file']['type'];
            $data->size = $_FILES['file']['size'];
            $data->real_path = $uploadDir;

            if($data->save()) {
                return $this->createJsonResponse(true, $data);
            }

        } else {
            return $this->createJsonResponse(true);
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
          $files =  File::all();
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
