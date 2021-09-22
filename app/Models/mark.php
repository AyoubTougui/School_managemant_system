<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mark extends Model
{
    protected $fillable = [
        'class_id',
        'group_id',
        'exam_id',
        'student_id',
        'mark'
    ];

    public function StudentName($id)
    {
        $student = User::select('users.name')
        ->join('students','users.id','=','students.user_id')
        ->where('students.id',$id)
        ->get();
        return $student[0]['name'];
    }
    
    public function ExamName($id)
    {
        $exam = exam::where('id',$id)->get('name');
        return $exam[0]['name'];
    }
}
