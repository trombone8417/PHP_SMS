<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['studentSession']], function () {
    Route::match(['get', 'post'], 'student-biodata', 'StudentController@studentBiodata');
    Route::match(['get', 'post'], 'account', 'StudentController@account');

    Route::match(['get', 'post'], 'student-choose-course', 'StudentController@studentChooseCourse');
    Route::match(['get', 'post'], 'student-lecture-calendar', 'StudentController@studentLectureCalendar');
    Route::match(['get', 'post'], 'student-lecture-activity', 'StudentController@studentLecture-Activity');
    Route::match(['get', 'post'], 'student-exam-marks', 'StudentController@studentExamMarks');
    Route::match(['get', 'post'], 'varify-password', 'StudentController@varifyPassword');
    Route::match(['get', 'post'], 'student-update-password', 'StudentController@changePassword');
});
Route::post('/insert',array('as'=>'insert','uses'=> 'ClassAssigningController@insert'));
Route::get('/student', 'StudentController@studentLogin');
Route::get('/logout','StudentController@studentLogout');
Route::post('/student-login', 'StudentController@LoginStudent');
// 忘記密碼
Route::get('/student-forgot-password', 'StudentController@getForgotPassword');
Route::post('/forgot-password', 'StudentController@ForgotPassword');


Auth::routes();

Route::get('/home', 'homeController@index');

Route::resource('classes', 'ClassesController');


Route::resource('classrooms', 'ClassroomController');

Route::resource('levels', 'LevelController');

Route::resource('batches', 'BatchController');

Route::resource('shifts', 'ShiftController');

Route::resource('courses', 'CourseController');

Route::resource('faculties', 'FacultyController');

Route::resource('times', 'TimeController');

Route::resource('attendances', 'AttendanceController');

Route::resource('academics', 'AcademicController');

Route::resource('days', 'DayController');

Route::resource('classAssignings', 'ClassAssigningController');

Route::resource('classSchedulings', 'ClassSchedulingController');

Route::resource('transactions', 'TransactionController');

Route::resource('admissions', 'AdmissionController');

Route::resource('teachers', 'TeacherController');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');


Route::resource('semesters', 'SemesterController');

Route::resource('classSchedules', 'ClassScheduleController');

Route::get('/dynamicLevel', ['as' => 'dynamicLevel', 'uses' => 'ClassScheduleController@DynamicLevel']);
Route::get('/class_schedules/edit', ['as' => 'edit', 'uses' => 'ClassScheduleController@edit']);


Route::resource('departments', 'DepartmentController');
