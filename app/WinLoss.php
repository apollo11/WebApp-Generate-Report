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


    private function getData($aArrFields, $aArrQuery = array())
    {
        $winLoss = DB::table('win_losses')->select($aArrFields);

        // find by id if id exists
        if ($aArrQuery) {
            $winLoss = $winLoss->where($aArrQuery);
        }

        // get data
        $winLossData = $winLoss->get();
        return $winLossData;
    }

    public function getDataById($aArrFields, $aIntId = null)
    {
        $arrQuery = array();

        if (null != $aIntId)
        {
            $arrQuery = array('id' => $aIntId);
        }

        return $this->getData($aArrFields, $arrQuery);
    }

    public function getDataByFileName($aArrFields, $aStrFilename)
    {
        $arrQuery = array('file_name' => $aStrFilename);
        return $this->getData($aArrFields, $arrQuery);
    }


}
