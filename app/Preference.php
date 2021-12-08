<?php

namespace App;
use App\PreferenceList;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $guarded = ['id'];
    protected $table = 'preferences';

    public function list() {
        return $this->hasOne(PreferenceList::class, 'id', 'preference_id');
    }
}
