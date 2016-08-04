<?php

namespace BackDoor;

use Illuminate\Database\Eloquent\Model;

class WinLoss extends Model
{
  protected $table = 'tb_file';
  protected $fillable = [
    'id',
    'name',
    'type',
    'size',
  ];

}
