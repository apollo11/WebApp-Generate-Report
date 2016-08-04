<?php

namespace BackDoor;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{

  protected $table = 'files';
  protected $fillable = [
    'id',
    'name',
    'type',
    'size',
  ];

}
