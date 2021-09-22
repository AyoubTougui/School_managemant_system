<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [App\Http\Controllers\HomeController::class, 'profileEdit'])->name('profile.edit');//HomeController@profileEdit
Route::put('/profile/update', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('profile.update');//HomeController@profileUpdate
Route::get('/profile/changepassword', [App\Http\Controllers\HomeController::class, 'changePasswordForm'])->name('profile.change.password');//HomeController@changePasswordForm
Route::post('/profile/changepassword', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('profile.changepassword');//HomeController@changePassword
Route::get('planning/DisplayPlanning',[App\Http\Controllers\PlanningController::class, 'DisplayPlanning'])->name('planning.DisplayPlanning');

Route::get('/planning',[App\Http\Controllers\PlanningController::class, 'index'])->name('planning.index');
Route::group(['middleware' => ['auth','role:Admin']], function () 
{
    Route::get('/roles-permissions', [App\Http\Controllers\RolePermissionController::class, 'roles'])->name('roles-permissions');//RolePermissionController@roles
    Route::get('/role-create', [App\Http\Controllers\RolePermissionController::class, 'createRole'])->name('role.create');//RolePermissionController@createRole
    Route::post('/role-store', [App\Http\Controllers\RolePermissionController::class, 'storeRole'])->name('role.store');//RolePermissionController@storeRole
    Route::get('/role-edit/{id}', [App\Http\Controllers\RolePermissionController::class, 'editRole'])->name('role.edit');//RolePermissionController@editRole
    Route::put('/role-update/{id}', [App\Http\Controllers\RolePermissionController::class, 'updateRole'])->name('role.update');//RolePermissionController@updateRole

    Route::get('/permission-create', [App\Http\Controllers\RolePermissionController::class, 'createPermission'])->name('permission.create');//RolePermissionController@createPermission
    Route::post('/permission-store', [App\Http\Controllers\RolePermissionController::class, 'storePermission'])->name('permission.store');//RolePermissionController@storePermission
    Route::get('/permission-edit/{id}', [App\Http\Controllers\RolePermissionController::class, 'editPermission'])->name('permission.edit');//RolePermissionController@editPermission
    Route::put('/permission-update/{id}', [App\Http\Controllers\RolePermissionController::class, 'updatePermission'])->name('permission.update');//RolePermissionController@updatePermission

    Route::get('assign-subject-to-class/{id}', [App\Http\Controllers\GradeController::class, 'assignSubject'])->name('class.assign.subject');//GradeController@assignSubject
    Route::post('assign-subject-to-class/{id}', [App\Http\Controllers\GradeController::class, 'storeAssignedSubject'])->name('store.class.assign.subject');//GradeController@storeAssignedSubject

    Route::get('mark/DisplayMark',[App\Http\Controllers\MarkController::class, 'DisplayMark'])->name('mark.DisplayMark');//MarkController@DisplayMark
    //Route::get('planning/DisplayPlanning',[App\Http\Controllers\PlanningController::class, 'DisplayPlanning'])->name('planning.DisplayPlanning');//PlanningController@DisplayPlanning
    Route::resource('assignrole', 'App\Http\Controllers\RoleAssign');//RoleAssign
    Route::resource('classes', 'App\Http\Controllers\GradeController');
    Route::resource('class_room', 'App\Http\Controllers\ClassRoomController');
    Route::resource('group', 'App\Http\Controllers\GroupController');
    Route::resource('subject', 'App\Http\Controllers\SubjectController');
    Route::resource('exam', 'App\Http\Controllers\ExamController');
    Route::resource('mark', 'App\Http\Controllers\MarkController'); 
    Route::resource('teacher', 'App\Http\Controllers\TeacherController');
    Route::resource('parents', 'App\Http\Controllers\ParentsController');
    Route::resource('student', 'App\Http\Controllers\StudentController');
    Route::resource('planning', 'App\Http\Controllers\PlanningController');
    Route::get('attendances', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');//AttendanceController@index
    Route::post('exam/fetch',[App\Http\Controllers\ExamController::class, 'fetch'])->name('exam.fetch');//ExamController@fetch
    Route::post('student/fetch',[App\Http\Controllers\StudentController::class, 'fetch'])->name('student.fetch');//StudentController@fetch
    Route::post('mark/fetch',[App\Http\Controllers\MarkController::class, 'fetch'])->name('mark.fetch');//MarkController@fetch
    Route::post('mark/fetchGroup',[App\Http\Controllers\MarkController::class, 'fetchGroup'])->name('mark.fetchGroup');//MarkController@fetchGroup
    Route::post('attendance/fetchDate', [App\Http\Controllers\AttendanceController::class, 'FetchDate'])->name('attendance.FetchDate');//AttendanceController@FetchDate
    Route::get('attendance/Display', [App\Http\Controllers\AttendanceController::class, 'DisplayAtt'])->name('attendance.DisplayAtt');//AttendanceController@FetchDate

});

Route::group(['middleware' => ['auth','role:Teacher']], function () 
{
    Route::post('attendance_store', [App\Http\Controllers\AttendanceController::class, 'store'])->name('teacher.attendance.store');//AttendanceController@store
    Route::post('attendance_update', [App\Http\Controllers\AttendanceController::class, 'update'])->name('teacher.attendance.update');
    Route::get('attendance', [App\Http\Controllers\AttendanceController::class, 'createByTeacher'])->name('attendance.create');//AttendanceController@createByTeacher
});

Route::group(['middleware' => ['auth','role:Parent']], function () 
{
});

Route::group(['middleware' => ['auth','role:Student|Parent']], function () {
    Route::get('attendance_show', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendance.show');//AttendanceController@show
});
