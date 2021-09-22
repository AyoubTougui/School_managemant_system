<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class planning extends Model
{
    protected $fillable = [
        'class_id',
        'group_id',
        'subject_id',
        'teacher_id', 
        'room_id',
        'day',
        'time'
    ];

    public function Subjectname($id)
    {
        $subject = Subject::where('id',$id)->get('name');
        return $subject[0]['name'];
    }

    public function Roomname($id)
    {
        $room = ClassRoom::where('id',$id)->get('name');
        return $room[0]['name'];
    }

    public function TeacherName($id)
    {
        $teacher = User::select('users.name')
        ->join('teachers','users.id','=','teachers.user_id')
        ->where('teachers.id',$id)
        ->get();
        return $teacher[0]['name'];
    }

    public function CLassName($id)
    {
        $class = Grade::where('id',$id)->get('class_name');
        return $class[0]['class_name'];
    }

    public function GroupName($id)
    {
        $group = Group::where('id',$id)->get('name');
        return $group[0]['name'];
    }
}
