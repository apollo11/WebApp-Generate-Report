<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use BackDoor\Http\Requests;
use BackDoor\testDbTable;
use Excel;

class ExcelImport extends Controller
{
  private $winLossSheet;

  public function excelLoad()
  {

  }

  public function excelImport()
  {

    Excel::load('/home/mike/Backdoor.xlsx', function($reader) {

      $this->winLossSheet = $reader->get();

    });

    return response()->json($this->winLossSheet);
  }

  public function insertToDb()
  {

    Excel::load('Backdoor.xlsx', function($reader) {

      $this->winLossSheet = $reader->each(function($sheet) {

        //Loop through all rows

          foreach($sheet as $data) {

            print '<pre>';
            print 'Member: '.$data->member;
            print 'Bet Reference: '.$data->bet_reference;
            print 'Table Number: '.$data->table_number;
            print 'Game: '.$data->game;

            print '</pre>';
          }


      });

    });



  }

}
