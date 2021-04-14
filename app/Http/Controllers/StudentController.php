<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Admission;
use App\Roll;
use Illuminate\Http\Request;
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
