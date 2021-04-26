<?php

namespace App\Repositories;

use App\Models\ClassAssigning;
use App\Repositories\BaseRepository;

/**
 * Class ClassAssigningRepository
 * @package App\Repositories
 * @version January 12, 2021, 7:37 am UTC
*/

class ClassAssigningRepository extends BaseRepository
{
    protected $primaryKey = 'class_assign_id';
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'teacher_id',
        'class_schedule_id',
    ];

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
        return ClassAssigning::class;
    }
}
