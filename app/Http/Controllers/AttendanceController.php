<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Models\planning;
use App\Models\Group;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Grade::get();
        return view('backend.attendance.index',compact('classes'));
    }

    public function FetchDate(Request $request)
    {
        $id = $request->id;
        $plannings = planning::where('group_id',$id)->get('id');
        $date = Attendance::distinct()->whereIn('planning_id',$plannings)->orderBy('attendance_date', 'desc')->get('attendance_date');
        return response()->json(array('date' => $date));
    }

    public function DisplayAtt(Request $request)
    {
        $classes = Grade::get();
        $group = $request->get('group_id');
        $date = $request->get('date');
        if(isset($date)){
            $plannings = planning::where('group_id',$group)->get('id');
            $attendance = Attendance::whereIn('planning_id',$plannings)->where('attendance_date',$date)->get();
            $times = array();
            foreach ($attendance as $a) {
                if (!in_array($a->planning->time,$times)) {
                    $times[]=$a->planning->time;
                }
            }
            return view('backend.attendance.index',compact('attendance','classes','times'));
        }else{
            $plannings = planning::where('group_id',$group)->get('id');
            $attendance = Attendance::whereIn('planning_id',$plannings)->get();
            $dates = Attendance::distinct()->whereIn('planning_id',$plannings)->orderBy('attendance_date', 'desc')->get('attendance_date');
            return view('backend.attendance.index',compact('attendance','classes','dates'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function createByTeacher(Request $request)
    {
        //dd($request);
        $id = $request->get('id');
        if($request->get('date')){ 
            $date = $request->get('date');
        }elseif($request->get('old')){
            $dateO = Attendance::where('planning_id',$id)->latest('attendance_date')->first();
            if ($dateO != null) {
                $date = $dateO->attendance_date;
            }else {
                return back();
            } 
        }else {
            $date = date('Y-m-d');
        }

        $attendance = Attendance::where('planning_id',$id)->where('attendance_date',$date)->get(); 
        $allDates = Attendance::distinct()->where('planning_id',$id)->get('attendance_date');
        $planning = planning::findOrFail($id);
        $group = Group::findOrFail($planning->group_id);
        $class = Grade::findOrFail($planning->class_id);
        $students = Student::where('group_id',$planning->group_id)->get();
        if ($attendance->isEmpty()) {
            return view('backend.attendance.create', compact('class','planning','group','students')); 
        }else{
            return view('backend.attendance.show', compact('allDates','class','planning','group','students','attendance')); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planning_id = $request->planning_id;
        $date = date('Y-m-d');

        $request->validate([ 
            'planning_id'      => 'required|numeric',
            'attendences'   => 'required'
        ]);

        foreach ($request->attendences as $studentid => $attendence) {

            if( $attendence == 'present' ) {
                $attendance_status = true;
            } else if( $attendence == 'absent' ){
                $attendance_status = false;
            }

            Attendance::create([
                'planning_id'       => $request->planning_id,
                'student_id'        => $studentid,
                'attendance_date'   => $date,
                'attendance_status' => $attendance_status
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->get('student');
        $student = Student::where('user_id',$request->get('student'))->first();
        if ($request->get('date')) {
            $attendances = Attendance::where('student_id',$student->id)->where('attendance_date',$request->get('date'))->orderBy('attendance_date', 'desc')->get();
        }else{
            $attendances = Attendance::where('student_id',$student->id)->orderBy('attendance_date', 'desc')->get();
        }

        $allDates = Attendance::distinct()->where('student_id',$student->id)->get('attendance_date');
        //$attendances = null;
        return view('backend.attendance.show', compact('attendances','allDates','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $att = json_decode($request->att,true) ;
        $attendances = $request->attendences;

        $request->validate([
            'att'      => 'required',
            'attendences'   => 'required'
        ]);

        $studentid = array();
        foreach ($att as $a => $attendence) {
            $idatt = $attendence['id'];
            $planning = $attendence['planning_id'];
            $date = $attendence['attendance_date'];
            $studentid[$idatt]=$attendence['student_id'];
        }

       foreach ($attendances as $student => $status) {
            if (in_array($student,$studentid)) {

                if( $status == 'present' ) {
                    $attendance_status = true;
                } else if( $status == 'absent' ){
                    $attendance_status = false;
                }
                $attend = Attendance::findOrFail(array_search($student,$studentid));
                $attend->update([
                    'attendance_status'  => $attendance_status,
                ]);
                
                
            }else {
                if( $status == 'present' ) {
                    $attendance_status = true;
                } else if( $status == 'absent' ){
                    $attendance_status = false;
                }
                Attendance::create([
                    'planning_id'       => $planning,
                    'student_id'        => $student,
                    'attendance_date'   => $date,
                    'attendance_status' => $attendance_status
                ]);
                
            }
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
