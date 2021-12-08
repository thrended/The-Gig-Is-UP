<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class SecurityQuestion extends Model
{
    protected $guarded = ['id'];
    protected $table = 'security_questions';
}
