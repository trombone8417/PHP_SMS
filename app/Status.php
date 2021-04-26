<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $fillable=[
        'teacher_id'
    ];
    protected $primaryKey = 'status_id';
}
