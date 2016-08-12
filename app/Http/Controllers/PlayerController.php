<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;

use BackDoor\Http\Requests;
use BackDoor\WinLoss as WinLoss;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $field = [
            'id',
            'member',
            'bet_time',
            'datetime',
            'table_number',
            'game',
            'effective_bet_amount',
            'win_loss',
            'month'
        ];

        $playerData = DB::table('win_losses')
          ->select($field)
          ->get();

        return response()->json($playerData);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $arrFields = [
          'id',
          'member',
          'bet_time',
          'datetime',
          'table_number',
          'game',
          'effective_bet_amount',
          'win_loss',
          'month'
        ];

        $player = new WinLoss();
        $playerData = $player->getData($arrFields, $id);

        return $this->createJsonResponse($playerData);
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
