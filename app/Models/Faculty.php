<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faculty
 * @package App\Models
 * @version January 12, 2021, 7:23 am UTC
 *
 * @property string $faculty_name
 * @property string $faculty_code
 * @property string $faculty_description
 * @property boolean $faculty_status
 */
class Faculty extends Model
{
    use SoftDeletes;

    public $table = 'faculties';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'faculty_name',
        'faculty_code',
        'faculty_description',
        'faculty_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'faculty_id' => 'integer',
        'faculty_name' => 'string',
        'faculty_code' => 'string',
        'faculty_description' => 'string',
        'faculty_status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'faculty_name' => 'required|string|max:255',
        'faculty_code' => 'required|string|max:255',
        'faculty_description' => 'required|string',
        'faculty_status' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
