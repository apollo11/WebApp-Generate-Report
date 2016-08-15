<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;

use BackDoor\Http\Requests;
use BackDoor\WinLoss as WinLoss;

class PlayerController extends Controller
{

    protected $fields;

    public function __construct()
    {
        // necessary fields for player
        $this->fields = [
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
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playerData = DB::table('win_losses')
          ->select($this->fields)
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

        $winLoss = new WinLoss();
        $playerData = $winLoss->getDataById($this->fields, $id);

        return $this->createJsonResponse($playerData);
    }

    public function showFile($filename)
    {
        $winLoss = new WinLoss();
        $playerData = $winLoss->getDataByFileName($this->fields, $filename);

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
