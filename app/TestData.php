<?php

namespace BackDoor;

use Illuminate\Database\Eloquent\Model;

class TestData extends Model
{
  protected $table ='test_datas';
  protected $fillable = ['Member', 'Reference','Game'];
}
