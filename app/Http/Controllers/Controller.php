<?php

namespace BackDoor\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use BackDoor\WinLoss as WinLoss;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function createJsonResponse($isSuccess, $arrContent = array())
    {
        return response()->json(array(
            'success' => $isSuccess,
            'content' => $arrContent,
        ));
    }
}
