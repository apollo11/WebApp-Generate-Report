<?php

namespace BackDoor;

use Illuminate\Database\Eloquent\Model;
use DB;

class WinLoss extends Model
{

    public function file()
    {
        return $this->hasOne('BackDoor\file');
    }


    public function getData($aArrFields, $aIntId = null)
    {
        $winLoss = DB::table('win_losses')->select($aArrFields);

        // find by id if id exists
        if (null != $aIntId) {
            $winLoss = $winLoss->where('id','=', $aIntId);
        }

        // get data
        $winLossData = $winLoss->get();

        return $winLossData;
    }


}
