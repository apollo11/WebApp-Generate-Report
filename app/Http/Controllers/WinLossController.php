<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;
use BackDoor\file as file;
use BackDoor\WinLoss as WinLoss;
use Excel;
use DB;


class WinLossController extends Controller
{
  protected $fileName;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $field = [
      'id',
      'bet_time',
      'game',
      'effective_bet_amount',
      'casino_win_loss',
      'month',
      'balance'
    ];

    $winLossData = DB::table('win_losses')
      ->select($field)
      ->get();

    return response()->json($winLossData);
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

  }


  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $field = [
      'id',
      'bet_time',
      'game',
      'effective_bet_amount',
      'casino_win_loss',
      'month',
      'balance'
    ];

    $winLossData = DB::table('win_losses')
      ->select($field)
      ->where('id','=', $id)
      ->get();

    return response()->json($winLossData);
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
