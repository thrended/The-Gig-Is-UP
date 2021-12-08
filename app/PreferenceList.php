<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PreferenceList extends Model
{
    protected $guarded = ['id'];
    protected $table = 'preference_list';
}
