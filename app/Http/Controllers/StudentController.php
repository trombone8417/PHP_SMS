<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Admission;
use App\Roll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * 學生資料
     *
     * @param Request $request
     * @return void
     */
    public function studentBiodata(Request $request)
    {
        $students = Roll::join('admissions', 'admissions.student_id', '=', 'rolls.student_id')
            ->where(['username' => Session::get('studentSession')])->first();
        return view('students.lectures.biodata', compact('students'));
    }
    public function studentChooseCourse(Request $request)
    {
        return view('students.lectures.choose-course');
    }
    public function studentLectureCalendar(Request $request)
    {
        return view('students.lectures.calendar');
    }
    public function studentLogin(Request $request)
    {
        return view('students.login');
    }
    public function LoginStudent(Request $request)
    {
        // 如果是使用POST
        if ($request->isMethod('post')) {
            $student = $request->all();
            // 是否有學生(帳密需正確)
            $studentCount = Roll::where(['username' => $student['username'], 'password' => $student['password']])->count();
            // 如果有的話
            if ($studentCount > 0) {
                // 加入Session
                Session::put('studentSession', $student['username']);
                // 顯示歡迎訊息
                Flash::success('Welcome ' . $student['username']);
                return redirect('/account');
            } else {
                // 錯誤的話，顯示錯誤訊息
                Flash::error('Your Username or Password is Incorrent!');
                return redirect('/student');
            }
        }
    }
    public function studentLogout(Request $request) {
        Auth::logout();
        return redirect('/student');
      }
    public function varifyPassword(Request $request)
    {
        $students = $request->all();
        $validStudent = Roll::where(['username' => Session::get('studentSession'), 'password' => $students['oldPassword']])->count();
        // 確認該用戶是否存在
        if ($validStudent==1) {
            echo "true";die;

        } else {
            echo "false";die;

        }

        //return view('students.lectures.biodata',compact('students'));
    }
    public function changePassword(Request $request)
    {
        $student=$request->all();
        $students=Admission::where('email',$student['email'])->first();
        $studentCount = Roll::where(['username' => Session::get('studentSession'), 'password' => $student['oldPassword']])->count();
        if ($studentCount == 1) {
            $newPassword = $student['newPassword'];
            Roll::where('username',Session::get('studentSession'))->update(['password'=>$newPassword]);
             Flash::success('You have Successfully changed your password.');
             return redirect()->back();
        } else {
            Flash::error('Password Failed to Update');
            return redirect()->back();
        }

    }
    public function getForgotPassword(Request $request)
    {
        return view('students.forgot-password');
    }
    /**
     * 忘記密碼(寄信)
     *
     * @param Request $request
     * @return void
     */
    public function ForgotPassword(Request $request)
    {
        $data = $request->all();
        $studentCount = Admission::where('email',$data['email'])->count();
        if ($studentCount == 0) {
        Flash::error('We cant find a student with that e-mail address.');
        return redirect()->back();
        }
        Session::put('studentSession');
        $students = Admission::where('email',$data['email'])->first();
        $ran_password = Str::random(12);
        $new_password = $ran_password;
        Roll::where('username',Session::get('studentSession'))->update(['password'=>$new_password]);
        $email = $data['email'];
        $student_name = $students->first_name;
        $message = [
            'email'=>$email,
            'first_name'=>$student_name,
            'password'=>$new_password
        ];
        Mail::send('emails.forgot-password', $message, function ($message)use($email) {
            $message->to($email)->subject('Reset Password - Academic Information System');
        });
        Flash::success('We have e-mailed your password Reset Link to'.$data['email']);
        return redirect()->back();

    }
    public function account()
    {
        // 若有Session值
        if (Session::has('studentSession')) {
            // 撈出學生的資料
            $student = Admission::all();
        } else {
            // 沒有的話，轉回學生登入頁面
            return redirect('/student')->with('error', 'please login to access');
        }
        // 有的話，進入account頁面，帶入學生資料
        return view('students.account', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
