<?php

namespace BackDoor;

use Illuminate\Database\Eloquent\Model;

class WinLoss extends Model
{

  public function file() {

    return $this->hasOne('BackDoor\file');
  }

}
