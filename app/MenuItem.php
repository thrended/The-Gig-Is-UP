<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $guarded = ['id'];
    protected $table = 'menu_items';
}
