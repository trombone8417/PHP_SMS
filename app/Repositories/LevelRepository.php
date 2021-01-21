<?php

namespace App\Repositories;

use App\Models\Level;
use App\Repositories\BaseRepository;

/**
 * Class LevelRepository
 * @package App\Repositories
 * @version January 12, 2021, 7:11 am UTC
*/

class LevelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'level',
        'course_id',
        'level_description'
    ];
    protected $primaryKey = 'level_id';
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Level::class;
    }
}
