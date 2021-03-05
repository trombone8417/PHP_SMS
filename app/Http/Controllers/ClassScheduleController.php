<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassScheduleRequest;
use App\Http\Requests\UpdateClassScheduleRequest;
use App\Repositories\ClassScheduleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use DB;
use Flash;
use Response;

use App\models\Batch;
use App\models\Classes;
use App\models\ClassRoom;
use App\models\Course;
use App\models\Day;
use App\models\Level;
use App\models\Semester;
use App\models\Shift;
use App\models\Time;

class ClassScheduleController extends AppBaseController
{
    /** @var  ClassScheduleRepository */
    private $classScheduleRepository;

    public function __construct(ClassScheduleRepository $classScheduleRepo)
    {
        $this->classScheduleRepository = $classScheduleRepo;
    }

    /**
     * Display a listing of the ClassSchedule.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $batch = Batch::all();
        $class = Classes::all();
        $course = Course::all();
        $day = Day::all();
        $level = Level::all();
        $semester = Semester::all();
        $shift = Shift::all();
        $classroom = ClassRoom::all();
        $time = Time::all();
        $classSchedules = DB::table('class_schedules')->select(
            'courses.*',
            'batches.*',
            'levels.*',
            'days.*',
            'semesters.*',
            'classes.*',
            'classrooms.*',
            'shifts.*',
            'times.*',
            'class_schedules.*'
        )
        ->join('courses','courses.course_id','=','class_schedules.course_id')
        ->join('batches','batches.batch_id','=','class_schedules.batch_id')
        ->join('classes','classes.class_id','=','class_schedules.class_id')
        ->join('days','days.day_id','=','class_schedules.day_id')
        ->join('levels','levels.level_id','=','class_schedules.level_id')
        ->join('semesters','semesters.semester_id','=','class_schedules.semester_id')
        ->join('classrooms','classrooms.classroom_id','=','class_schedules.classroom_id')
        ->join('shifts','shifts.shift_id','=','class_schedules.shift_id')
        ->join('times','times.time_id','=','class_schedules.time_id')
        ->get();

        return view('class_schedules.index',compact('classschedules','batch','class','course','day','level','semester','shift','classroom','time'))
            ->with('classSchedules', $classSchedules);
    }

    public function DynamicLevel(Request $request)
    {
        $course_id = $request->get('course_id');
        $levels = Level::where('course_id','=',$course_id)->get();
        return response()->json($levels);
    }
    /**
     * Show the form for creating a new ClassSchedule.
     *
     * @return Response
     */
    public function create()
    {
        return view('class_schedules.create');
    }

    /**
     * Store a newly created ClassSchedule in storage.
     *
     * @param CreateClassScheduleRequest $request
     *
     * @return Response
     */
    public function store(CreateClassScheduleRequest $request)
    {
        $input = $request->all();

        $classSchedule = $this->classScheduleRepository->create($input);

        Flash::success('Class Schedule saved successfully.');

        return redirect(route('classSchedules.index'));
    }

    /**
     * Display the specified ClassSchedule.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classSchedule = $this->classScheduleRepository->find($id);

        if (empty($classSchedule)) {
            Flash::error('Class Schedule not found');

            return redirect(route('classSchedules.index'));
        }

        return view('class_schedules.show')->with('classSchedule', $classSchedule);
    }

    /**
     * Show the form for editing the specified ClassSchedule.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classSchedule = $this->classScheduleRepository->find($id);

        if (empty($classSchedule)) {
            Flash::error('Class Schedule not found');

            return redirect(route('classSchedules.index'));
        }

        return view('class_schedules.edit')->with('classSchedule', $classSchedule);
    }

    /**
     * Update the specified ClassSchedule in storage.
     *
     * @param int $id
     * @param UpdateClassScheduleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassScheduleRequest $request)
    {
        $classSchedule = $this->classScheduleRepository->find($id);

        if (empty($classSchedule)) {
            Flash::error('Class Schedule not found');

            return redirect(route('classSchedules.index'));
        }

        $classSchedule = $this->classScheduleRepository->update($request->all(), $id);

        Flash::success('Class Schedule updated successfully.');

        return redirect(route('classSchedules.index'));
    }

    /**
     * Remove the specified ClassSchedule from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classSchedule = $this->classScheduleRepository->find($id);

        if (empty($classSchedule)) {
            Flash::error('Class Schedule not found');

            return redirect(route('classSchedules.index'));
        }

        $this->classScheduleRepository->delete($id);

        Flash::success('Class Schedule deleted successfully.');

        return redirect(route('classSchedules.index'));
    }
}
