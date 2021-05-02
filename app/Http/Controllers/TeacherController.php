<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Repositories\TeacherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Teacher;
use App\Exports\Teacher_Export;
use Maatwebsite\Excel\Facades\Excel;
class TeacherController extends AppBaseController
{
    /** @var  TeacherRepository */
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->teacherRepository = $teacherRepo;
    }

    /**
     * Display a listing of the Teacher.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $teachers = $this->teacherRepository->all();

        return view('teachers.index')
            ->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new Teacher.
     *
     * @return Response
     */
    public function create()
    {

        return view('teachers.create');
    }

    /**
     * Store a newly created Teacher in storage.
     *
     * @param CreateTeacherRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $input = $request->all();

        // name=images
        $image = $request->file('images');
        // 圖片的原始名稱
        $image_oragin_name = $image->getClientOriginalName();
        // 儲存圖片名稱=Timestamp+圖片的原始名稱
        $image_name = Time().'_'.$image_oragin_name;
        $image->move(public_path('teacher_images'),$image_name);

        $teacher = new Teacher;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->nationality = $request->nationality;
        $teacher->passport = $request->passport;
        $teacher->status = $request->status;
        $teacher->dateregistered = $request->dateregistered;
        $teacher->user_id = $request->user_id;
        $teacher->image = $image_name;
        $teacher->save();
        Flash::success('Teacher saved successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show')->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified Teacher in storage.
     *
     * @param int $id
     * @param UpdateTeacherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherRequest $request)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        $teacher = $this->teacherRepository->update($request->all(), $id);

        Flash::success('Teacher updated successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified Teacher from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        $this->teacherRepository->delete($id);

        Flash::success('Teacher deleted successfully.');

        return redirect(route('teachers.index'));
    }
    /**
     * 匯出 Excel，檔名 xlsx
     *
     * @return void
     */
    public function ExportExcel_xlsx()
    {
        return Excel::download(new Teacher_Export,'Teachers.xlsx');
    }
    /**
     * 匯出 Excel，檔名 csv
     *
     * @return void
     */
    public function ExportExcel_csv()
    {
        return Excel::download(new Teacher_Export,'Teachers.csv');
    }
    /**
     * 匯出 Excel，檔名 xls
     *
     * @return void
     */
    public function ExportExcel_xls()
    {
        return Excel::download(new Teacher_Export,'Teachers.xls');
    }
}
