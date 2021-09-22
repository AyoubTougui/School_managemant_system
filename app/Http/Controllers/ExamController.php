<?php

namespace App\Http\Controllers;

use App\Models\exam;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Group;

use Illuminate\Http\Request;
use DB;

class ExamController extends Controller
{
    public function index()
    {
        $exams = exam::get(); 
        return view('backend.exam.index',compact('exams'));
    }

    public function create()
    {   
        $classes = Grade::get();
        return view('backend.exam.create',compact('classes'));
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

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'class_id'       => 'required',
            'group_id'       => 'required',
            'subject_id'       => 'required',
            'date'       => 'required'
        ]);

        exam::create([
            'name'        => $request->name,
            'class_id'    => $request->class_id,
            'group_id'    => $request->group_id,
            'subject_id'    => $request->subject_id,
            'date'    => $request->date
        ]);
        return redirect()->route('exam.index');
    }


    public function destroy($id)
    {
        $exam = exam::findOrFail($id);
        $exam->delete();

        return back();
    }


    public function edit($id)
    {
        $classes = Grade::get(); 
        $exam = exam::findOrFail($id);
        $groups = Group::where('id_class',$exam->class_id)->get();
        $subjects = DB::table("grade_subject")
        ->select('subjects.*')
        ->join('subjects','subjects.id','=','grade_subject.subject_id')
        ->where('grade_subject.grade_id',$exam->class_id)
        ->get();
        return view('backend.exam.edit',compact('exam','classes','groups','subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([ 
            'name'        => 'required',
            'class_id'       => 'required',
            'group_id'       => 'required',
            'subject_id'       => 'required',
            'date'       => 'required'
        ]);

        $exam = exam::findOrFail($id);

        $exam->update([
            'name'        => $request->name,
            'class_id'    => $request->class_id,
            'group_id'    => $request->group_id,
            'subject_id'    => $request->subject_id,
            'date'    => $request->date
        ]);

        return redirect()->route('exam.index');
    }
}
