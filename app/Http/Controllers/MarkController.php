<?php

namespace App\Http\Controllers;

use App\Models\mark;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Group;
use App\Models\exam;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use DB;

class MarkController extends Controller 
{
    public function index()
    {
        $marks = mark::get();
        $classes = Grade::get();
        return view('backend.mark.index',compact('marks','classes'));
    }

    public function create(Request $request)
    {   
        $classes = Grade::get();
        $group = $request->get('group_id');
        if(isset($group)){
            $students = DB::table('users')
            ->select('users.name','students.id')
            ->join('students','users.id','=','students.user_id')
            ->where('students.group_id',$group)
            ->get();
            return view('backend.mark.create',compact('classes','students'));
        }else{
            return view('backend.mark.create',compact('classes'));
        }
    }

    public function store(Request $request)
    {
        //dd($request);
        $class = $request->class;
        $group = $request->group;
        $exam = $request->exam;
        
        $request->validate([
            'class'       => 'required',
            'group'       => 'required',
            'exam'       => 'required',
            'marks'       => 'required'
        ]);
        foreach ($request->marks as $student_id => $mark) {
            if ($mark == null) {
                $mark = 00.00;
            }
            mark::create([
                'class_id'    => $class,
                'group_id'    => $group,
                'exam_id'    => $exam,
                'student_id'    => $student_id,
                'mark'    => $mark
            ]);    
        }
        return redirect()->route('mark.index'); 
    }

    public function fetch(Request $request){
        $value = $request->id;
        $s = DB::table("grade_subject")
        ->select('subjects.*')
        ->join('subjects','subjects.id','=','grade_subject.subject_id')
        ->where('grade_subject.grade_id',$value)
        ->get();
        $group = Group::where('id_class',$value)->get();
        return response()->json(array('group' => $group, 'subjects' => $s));
    } 

    public function fetchGroup(Request $request){
        $id = $request->id;
        $exam = exam::where('group_id',$id)->get();
       
        return response()->json(array('exam' => $exam));
    }

    public function DisplayMark(Request $request){
        $id= $request->get('group_id');
        $marks = mark::where('group_id',$id)->get();
        $classes = Grade::get();
        return view('backend.mark.index',compact('marks','classes'));
    }

    public function edit($id)
    {   
        $classes = Grade::get();
        $marks = mark::findOrFail($id);
        return view('backend.mark.edit',compact('marks','classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id'       => 'required',
            'group_id'       => 'required',
            'exam_id'       => 'required',
            'student_id'       => 'required',
            'mark'       => 'required'
        ]);

        $mark = mark::findOrFail($id);

        $mark->update([
            'class_id'    => $request->class_id,
            'group_id'    => $request->group_id,
            'exam_id'    => $request->exam_id,
            'student_id'    => $request->student_id,
            'mark'    => $request->mark
        ]);

        return redirect()->route('mark.index');
    }

    public function destroy($id)
    {
        $mark = mark::findOrFail($id);
        $mark->delete();

        return back();
    }

    public function show(){
        //
    }

}
