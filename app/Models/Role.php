<?php

namespace App\Models;

//use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 * @version January 12, 2021, 7:45 am UTC
 *
 * @property string $name
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';

    protected $primaryKey = 'role_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

}
