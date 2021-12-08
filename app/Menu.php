<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];
    protected $table = 'menus';

    public function options() {
        return $this->hasMany('App\MenuItem','menu_id','id');
    }
}
