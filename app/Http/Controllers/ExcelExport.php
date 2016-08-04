<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;

use BackDoor\Http\Requests;
use DB;
use BackDoor\testDbTable;
use Excel;

class ExcelExport extends Controller
{
  public function importToExcel ()
  {
    $test = DB::table('test_db_tables')->select('id', 'name', 'birthdate', 'amount')->get();
  $data = (array) $test;
//    return response()->json($test);
//    $data = array(
//      array('data1','data2'),
//      array('data3', 'data')
//    );

    Excel::create('test', function($excel) use($data) {
      $excel->sheet('Excelsheet', function($sheet) use($data) {
        $sheet->fromArray($data);
      });

    })->export('xls');
  }
}
