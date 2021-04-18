<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roll extends Model
{
    use SoftDeletes;
    public $fillable=[
        'student_id','username','password','login_time','logout_time'
    ];
    protected $primaryKey = 'roll_id';
    public static function onlineStudent()
    {
        $students = Roll::join('admissions','admissions.student_id','=','rolls.student_id')
        ->where(['username'=>Session::get('studentSession')])->first();
        return $students;
    }
}
