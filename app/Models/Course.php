<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 * @package App\Models
 * @version January 12, 2021, 7:19 am UTC
 *
 * @property string $course_name
 * @property string $course_code
 * @property string $description
 * @property boolean $status
 */
class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey = 'course_id';



    public $fillable = [
        'course_name',
        'course_code',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'course_id' => 'integer',
        'course_name' => 'string',
        'course_code' => 'string',
        'description' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_name' => 'required|string|max:255',
        'course_code' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
