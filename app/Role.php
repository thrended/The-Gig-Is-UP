<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];
    protected $table = 'roles';

    public function menu() {
        return $this->hasOne('App\Menu','name','name');
    }
}
