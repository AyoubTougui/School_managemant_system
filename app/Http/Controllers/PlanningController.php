<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Group;
use App\Models\planning;
use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\User;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PlanningController extends Controller
{
    public function index()
    {
        $empty=null;
        $classes = Grade::get();
        return view('backend.planning.index',compact('classes','empty'));
    }

    public function create(Request $request)
    {   
        $planning_teachers = planning::where('day',$request->get('day'))->where('time',$request->get('time'))->get('teacher_id');
        $planning_rooms = planning::where('day',$request->get('day'))->where('time',$request->get('time'))->get('room_id');
        $teachers = User::select('teachers.id','users.name')
        ->join('teachers','users.id','=','teachers.user_id')
        ->whereNotIn('teachers.id',$planning_teachers)
        ->get();
        $class = Grade::findOrFail($request->get('class'));
        //$subjects = Subject::get();
        $subjects = $class->subjects;
        $rooms = ClassRoom::whereNotIn('id',$planning_rooms)->get();
        return view('backend.planning.create',compact('subjects','teachers','rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id'       => 'required',
            'teacher_id'       => 'required',
            'room_id'       => 'required'
        ]);

        planning::create([
            'class_id'       => $request->query('class'),
            'group_id'       => $request->input('group'),
            'subject_id'       => $request->subject_id,
            'teacher_id'       => $request->teacher_id,
            'room_id'       => $request->room_id,
            'day'       => $request->input('day'),
            'time'       => $request->input('time')
        ]);
        return redirect()->route('planning.index');
    }

    public function DisplayPlanning(Request $request){
        $m8=$m10=$m14=$m16=null;
        $t8=$t10=$t14=$t16=null;
        $w8=$w10=$w14=$w16=null;
        $th8=$th10=$th14=$th16=null;
        $f8=$f10=$f14=$f16=null; 
        if ($request->get('student')) {
            $student = Student::where('user_id',$request->get('student'))->get();
            $id = $student[0]['group_id'];
            $cl = $student[0]['class_id'];
        }elseif ($request->get('child')) {
            $child = Student::where('id',$request->get('child'))->get();
            $id = $child[0]['group_id'];
            $cl = $child[0]['class_id'];
        }else{
            $id = $request->get('group_id');
            $cl = $request->get('class_id');
        }
        
      
        $plannings = planning::where('group_id',$id)->get();

        foreach ($plannings as $p) {
            if ($p->day == 'Monday' && $p->time == '8:00/10:00') {
                $m8 = $p;
            }
            if ($p->day == 'Monday' && $p->time == '10:00/12:00') {
                $m10 = $p;
            }
            if ($p->day == 'Monday' && $p->time == '14:00/16:00') {
                $m14 = $p;
            }
            if ($p->day == 'Monday' && $p->time == '16:00/18:00') {
                $m16 = $p;
            }
            //
            if ($p->day == 'Tuesday' && $p->time == '8:00/10:00') {
                $t8 = $p;
            }
            if ($p->day == 'Tuesday' && $p->time == '10:00/12:00') {
                $t10 = $p;
            }
            if ($p->day == 'Tuesday' && $p->time == '14:00/16:00') {
                $t14 = $p;
            }
            if ($p->day == 'Tuesday' && $p->time == '16:00/18:00') {
                $t16 = $p;
            }
            //
            if ($p->day == 'Wednesday' && $p->time == '8:00/10:00') {
                $w8 = $p;
            }
            if ($p->day == 'Wednesday' && $p->time == '10:00/12:00') {
                $w10 = $p;
            }
            if ($p->day == 'Wednesday' && $p->time == '14:00/16:00') {
                $w14 = $p;
            }
            if ($p->day == 'Wednesday' && $p->time == '16:00/18:00') {
                $w16 = $p;
            }
            //
            if ($p->day == 'Thursday' && $p->time == '8:00/10:00') {
                $th8 = $p;
            }
            if ($p->day == 'Thursday' && $p->time == '10:00/12:00') {
                $th10 = $p;
            }
            if ($p->day == 'Thursday' && $p->time == '14:00/16:00') {
                $th14 = $p;
            }
            if ($p->day == 'Thursday' && $p->time == '16:00/18:00') {
                $th16 = $p;
            }
            //
            if ($p->day == 'Friday' && $p->time == '8:00/10:00') {
                $f8 = $p;
            }
            if ($p->day == 'Friday' && $p->time == '10:00/12:00') {
                $f10 = $p;
            }
            if ($p->day == 'Friday' && $p->time == '14:00/16:00') {
                $f14 = $p;
            }
            if ($p->day == 'Friday' && $p->time == '16:00/18:00') {
                $f16 = $p;
            }
        }

        $empty='nope';

        $classes = Grade::get();
        return view('backend.planning.index',compact('classes','empty','id','cl','m8','m10','m14','m16',
        't8','t10','t14','t16','w8','w10','w14','w16','th8','th10','th14','th16','f8','f10','f14','f16'));
    }

    public function edit($id)
    {   
        $plannings = planning::findOrFail($id);
        $planning_teachers = planning::where('day',$plannings->day)->where('time',$plannings->time)->get('teacher_id');
        $planning_rooms = planning::where('day',$plannings->day)->where('time',$plannings->time)->get('room_id');
        $teachers = User::select('teachers.id','users.name')
        ->join('teachers','users.id','=','teachers.user_id')
        ->whereNotIn('teachers.id',$planning_teachers)
        ->get();
        $current_teacher = User::select('teachers.id','users.name')
        ->join('teachers','users.id','=','teachers.user_id')
        ->where('teachers.id',$plannings->teacher_id)
        ->first();
        $teachers->push($current_teacher);
        $class = Grade::findOrFail($plannings->class_id);
        $subjects = $class->subjects;
        $rooms = ClassRoom::whereNotIn('id',$planning_rooms)->get();
        $current_room = ClassRoom::where('id',$plannings->room_id)->first();
        $rooms->push($current_room);
        return view('backend.planning.edit',compact('plannings','subjects','teachers','rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_id'       => 'required',
            'teacher_id'       => 'required',
            'room_id'       => 'required'
        ]);

        $planning = planning::findOrFail($id);

        $planning->update([
            'subject_id'       => $request->subject_id,
            'teacher_id'       => $request->teacher_id,
            'room_id'       => $request->room_id
        ]);

        return redirect()->route('planning.index');
    }

    public function destroy($id)
    {
        $planning = planning::findOrFail($id);
        $planning->delete();

        return back();
    }
}
