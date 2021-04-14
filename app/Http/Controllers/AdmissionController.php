<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Repositories\AdmissionRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admission;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Faculty;
use App\Roll;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdmissionController extends AppBaseController
{
    /** @var  AdmissionRepository */
    private $admissionRepository;

    public function __construct(AdmissionRepository $admissionRepo)
    {
        $this->admissionRepository = $admissionRepo;
    }

    /**
     * Display a listing of the Admission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $batches = Batch::all();
        $roll_id = Roll::max('roll_id');
        if ($roll_id == null) {
            $roll_id = 0;
        }
        $student_id = Admission::max('student_id');
        $faculties = Faculty::all();
        $departments = Department::all();
        $admissions = Admission::join('faculties', 'faculties.faculty_id', 'admissions.faculty_id')
            ->join('departments', 'departments.department_id', 'admissions.department_id')
            ->join('batches', 'batches.batch_id', 'admissions.batch_id')->get();
        $rand_username_password = mt_rand(1111609300011 . $student_id, 1111609300011 . $student_id);
        return view('admissions.index', compact('batches', 'admissions', 'roll_id', 'student_id', 'faculties', 'departments', 'rand_username_password'));
    }

    /**
     * Show the form for creating a new Admission.
     *
     * @return Response
     */
    public function create()
    {
        return view('admissions.create');
    }

    /**
     * Store a newly created Admission in storage.
     *
     * @param CreateAdmissionRequest $request
     *
     * @return Response
     */
    public function store(CreateAdmissionRequest $request)
    {
        $input = $request->all();

        //$admission = $this->admissionRepository->create($input);

        // name=images
        $image = $request->file('images');
        // 圖片的原始名稱
        $image_oragin_name = $image->getClientOriginalName();
        // 儲存圖片名稱=Timestamp+圖片的原始名稱
        $image_name = Time() . '_' . $image_oragin_name;
        $image->move(public_path('student_images'), $image_name);

        $student = new Admission;
        $student->roll_no = $request->roll_no;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->father_name = $request->father_name;
        $student->father_phone = $request->father_phone;
        $student->mother_name = $request->mother_name;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->current_address = $request->current_address;
        $student->nationality = $request->nationality;
        $student->passport = $request->passport;
        $student->status = $request->status;
        $student->dateregistered = $request->dateregistered;
        $student->user_id = $request->user_id;
        $student->department_id = $request->department_id;
        $student->faculty_id = $request->faculty_id;
        $student->batch_id = $request->batch_id;
        $student->image = $image_name;
        if ($student->save()) {
            $student_id = $student->id;
            $username = $student->username;
            $password = $student->password;
            Roll::insert(['student_id' => $student_id, 'username' => $request->username, 'password' => $request->password]);
        }
        Flash::success($request->first_name.' '.$request->last_name.' saved successfully.');

        return redirect(route('admissions.index'));
    }

    /**
     * Display the specified Admission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        return view('admissions.show')->with('admission', $admission);
    }

    /**
     * Show the form for editing the specified Admission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $batches = Batch::all();
        $faculties = Faculty::all();
        $departments = Department::all();

        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        return view('admissions.edit', compact('batches', 'faculties', 'departments'))->with('admission', $admission);
    }

    /**
     * Update the specified Admission in storage.
     *
     * @param int $id
     * @param UpdateAdmissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdmissionRequest $request)
    {
        // $admission = $this->admissionRepository->find($id);
        $input = $request->all();
        // name=images
        $image = $request->file('images');
        $image_name=$request->old_image;
        if ($image!=null) {
            // 圖片的原始名稱
        $image_oragin_name = $image->getClientOriginalName();
        // 儲存圖片名稱=Timestamp+圖片的原始名稱
        $image_name = Time() . '_' . $image_oragin_name;
        $image->move(public_path('student_images'), $image_name);
        }


        $student= array(
        'roll_no' => $request->roll_no,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'father_name' => $request->father_name,
        'father_phone' => $request->father_phone,
        'mother_name' => $request->mother_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'dob' => $request->dob,
        'phone' => $request->phone,
        'address' => $request->address,
        'current_address' => $request->current_address,
        'nationality' => $request->nationality,
        'passport' => $request->passport,
        'status' => $request->status,
        'dateregistered' => $request->dateregistered,
        'user_id' => $request->user_id,
        'department_id' => $request->department_id,
        'faculty_id '=> $request->faculty_id,
        'batch_id' => $request->batch_id,
        'image' => $image_name);
        // 找出是否有學生的資料，如果有的話更新資料
        Admission::findOrfail($id)->update($student);
        if (empty($student)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        //$admission = $this->admissionRepository->update($request->all(), $id);

        Flash::success($request->first_name.' '.$request->last_name.' updated successfully.');

        return redirect(route('admissions.index'));
    }

    /**
     * Remove the specified Admission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        $this->admissionRepository->delete($id);

        Flash::success('Admission deleted successfully.');

        return redirect(route('admissions.index'));
    }
}
