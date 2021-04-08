<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roll extends Model
{
    use SoftDeletes;
    public $fillable=[
        'student_id','username','password','login_time','logout_time'
    ];
    protected $primaryKey = 'roll_id';
}
