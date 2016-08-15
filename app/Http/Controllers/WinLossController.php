<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;
use BackDoor\WinLoss;
use Excel;
use DB;


class WinLossController extends Controller
{
    protected $fileName;
    protected $fields;

    public function __construct ()
    {
        // initialize necessary fields
        $this->fields = [
            'id',
            'bet_time',
            'game',
            'effective_bet_amount',
            'casino_win_loss',
            'month',
            'balance'
        ];
    }


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

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $winLoss = new WinLoss();

        // get data with necessary fields only
        $winLossData = $winLoss->getDataById($this->fields, $id);

        return $this->createJsonResponse($winLossData);
    }

    public function showFile($filename)
    {
        $winLoss = new WinLoss();

        // get data with necessary fields only
        $winLossData = $winLoss->getDataByFileName($this->fields, $filename);

        return $this->createJsonResponse($winLossData);
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
