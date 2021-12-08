<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];
    protected $table = 'events';

    public function type() {
        return $this->hasOne('App\PreferenceList','id','event_type');
    }
}
