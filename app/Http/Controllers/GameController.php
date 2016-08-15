<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;
use BackDoor\Http\Requests;
use BackDoor\WinLoss as WinLoss;

class GameController extends Controller
{

    protected $fields;

    public function __construct()
    {
        // necessary fields for games
        $this->fields = [
            'id',
            'member',
            'game',
            'casino_win_loss',
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $winLoss = new WinLoss();

        // get data with necessary fields only
        $gameData = $winLoss->getDataById($this->fields, $id);

        return $this->createJsonResponse($gameData);
    }

    public function showFile($filename)
    {
        $winLoss = new WinLoss();

        // get data with necessary fields only
        $gameData = $winLoss->getDataByFileName($this->fields, $filename);

        return $this->createJsonResponse($gameData);
    }

}
