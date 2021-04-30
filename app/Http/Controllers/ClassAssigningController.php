<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassAssigningRequest;
use App\Http\Requests\UpdateClassAssigningRequest;
use App\Repositories\ClassAssigningRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Batch;
use App\Models\ClassAssigning;
use App\Models\Classes;
use App\Models\Classroom;
use App\Models\ClassSchedule;
use App\Models\Day;
use App\Models\Level;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Time;
use App\Status;
use PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClassAssigningController extends AppBaseController
{
    /** @var  ClassAssigningRepository */
    private $classAssigningRepository;

    public function __construct(ClassAssigningRepository $classAssigningRepo)
    {
        $this->classAssigningRepository = $classAssigningRepo;
    }

    /**
     * Display a listing of the ClassAssigning.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $classAssignings = ClassAssigning::join('class_schedules','class_schedules.schedule_id','class_assignings.class_schedule_id')
        ->join('teachers','teachers.teacher_id','=','class_assignings.teacher_id')
        ->join('courses','courses.course_id','=','class_schedules.course_id')
        ->join('batches', 'batches.batch_id', '=', 'class_schedules.batch_id')
        ->join('classes', 'classes.class_id', '=', 'class_schedules.class_id')
        ->join('days', 'days.day_id', '=', 'class_schedules.day_id')
        ->join('levels', 'levels.level_id', '=', 'class_schedules.level_id')
        ->join('semesters', 'semesters.semester_id', '=', 'class_schedules.semester_id')
        ->join('shifts', 'shifts.shift_id', '=', 'class_schedules.shift_id')
        ->join('times', 'times.time_id', '=', 'class_schedules.time_id')
        ->join('classrooms', 'classrooms.classroom_id', '=', 'class_schedules.classroom_id')
        ->paginate(10);
        $teacher = Teacher::get();

        $classSchedules = ClassSchedule::join('courses', 'courses.course_id', '=', 'class_schedules.course_id')
            ->join('batches', 'batches.batch_id', '=', 'class_schedules.batch_id')
            ->join('classes', 'classes.class_id', '=', 'class_schedules.class_id')
            ->join('days', 'days.day_id', '=', 'class_schedules.day_id')
            ->join('levels', 'levels.level_id', '=', 'class_schedules.level_id')
            ->join('semesters', 'semesters.semester_id', '=', 'class_schedules.semester_id')
            ->join('times', 'times.time_id', '=', 'class_schedules.time_id')
            ->join('shifts', 'shifts.shift_id', '=', 'class_schedules.shift_id')
            ->join('classrooms', 'classrooms.classroom_id', '=', 'class_schedules.classroom_id')
            ->get();
        return view('class_assignings.index', compact('classSchedules', 'teacher'))
            ->with('classAssignings', $classAssignings);
    }
    public function PDFgenerator(Request $request)
    {
        $classAssignings = ClassAssigning::all();
        $classAssignings = ClassAssigning::join('class_schedules','class_schedules.schedule_id','class_assignings.class_schedule_id')
        ->join('teachers','teachers.teacher_id','=','class_assignings.teacher_id')
        ->join('courses','courses.course_id','=','class_schedules.course_id')
        ->join('batches', 'batches.batch_id', '=', 'class_schedules.batch_id')
        ->join('classes', 'classes.class_id', '=', 'class_schedules.class_id')
        ->join('days', 'days.day_id', '=', 'class_schedules.day_id')
        ->join('levels', 'levels.level_id', '=', 'class_schedules.level_id')
        ->join('semesters', 'semesters.semester_id', '=', 'class_schedules.semester_id')
        ->join('shifts', 'shifts.shift_id', '=', 'class_schedules.shift_id')
        ->join('times', 'times.time_id', '=', 'class_schedules.time_id')
        ->join('classrooms', 'classrooms.classroom_id', '=', 'class_schedules.classroom_id')
        ->paginate(10);
        $dompdf = PDF::loadview('class_assignings.pdf', compact('classAssignings'));
        $dompdf->setPaper('A4','landscape');
        $dompdf->stream();
        return $dompdf->download('Class_Assigning_Table.pdf');
    }
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(),['teacher_id' => 'required']);
        if ($validator->fails()) {
            Flash::error('Teacher can not be empty! ');
            return redirect(route('classAssignings.index'));
        }
        $input = $request->all();
        $teacher = new Status;
        $teacher->teacher_id = $request->teacher_id;
        $status_id = $teacher->save();
        if ($status_id != 0) {
            foreach ($request->multiclass as $class) {
                $data2 = array('teacher_id'=>$request->teacher_id,'class_schedule_id'=>$class);

                $checkExist = ClassAssigning::where('teacher_id', $request->teacher_id)
                    ->where('class_schedule_id', $class)
                    ->first();
                if ($checkExist) {
                    Flash::error('Class Assigning for this Teacher alread Exist.');
                    return redirect(route('classAssignings.index'));
                }
                ClassAssigning::insert($data2);
            }
        }
        Flash::success('Class Assigning Generate successfully!.');
        return redirect(route('classAssignings.index'));
    }


    /**
     * Show the form for creating a new ClassAssigning.
     *
     * @return Response
     */
    public function create()
    {
        return view('class_assignings.create');
    }

    /**
     * Store a newly created ClassAssigning in storage.
     *
     * @param CreateClassAssigningRequest $request
     *
     * @return Response
     */
    public function store(CreateClassAssigningRequest $request)
    {
        $input = $request->all();

        $classAssigning = $this->classAssigningRepository->create($input);

        Flash::success('Class Assigning saved successfully.');

        return redirect(route('classAssignings.index'));
    }

    /**
     * Display the specified ClassAssigning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        return view('class_assignings.show')->with('classAssigning', $classAssigning);
    }

    /**
     * Show the form for editing the specified ClassAssigning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        return view('class_assignings.edit')->with('classAssigning', $classAssigning);
    }

    /**
     * Update the specified ClassAssigning in storage.
     *
     * @param int $id
     * @param UpdateClassAssigningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassAssigningRequest $request)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        $classAssigning = $this->classAssigningRepository->update($request->all(), $id);

        Flash::success('Class Assigning updated successfully.');

        return redirect(route('classAssignings.index'));
    }

    /**
     * Remove the specified ClassAssigning from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        $this->classAssigningRepository->delete($id);

        Flash::success('Class Assigning deleted successfully.');

        return redirect(route('classAssignings.index'));
    }
}
