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
            'bet_reference',
            'bet_time',
            'table_number',
            'game',
            'effective_bet_amount',
            'casino_win_loss',
            'month',
        ];

        // get data with necessary fields only
        $winLoss = new WinLoss();
        $winLossData = $winLoss->getData($arrFields, $id);

        return $this->createJsonResponse($winLossData);
    }

}
