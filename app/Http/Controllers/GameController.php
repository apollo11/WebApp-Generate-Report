<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Http\Request;
use BackDoor\Http\Requests;
use BackDoor\WinLoss as WinLoss;

class GameController extends Controller
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
            'game',
            'casino_win_loss',
            'balance'
        ];

        // get data with necessary fields only
        $winLoss = new WinLoss();
        $winLossData = $winLoss->getData($arrFields, $id);

        return $this->createJsonResponse($winLossData);
    }

}
