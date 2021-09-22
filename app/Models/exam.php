<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $fillable = [
        'name',
        'class_id',
        'group_id',
        'subject_id',
        'date'
    ];

    public function group()
    {
        return $this->hasMany(Group::class);
    }
    
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function Groupname($id)
    {
        $group = Group::where('id',$id)->get('name');
        return $group[0]['name'];
    }
    
    public function Subjectname($id)
    {
        $subject = Subject::where('id',$id)->get('name');
        return $subject[0]['name'];
    }

    public function CLassName($id)
    {
        $class = Grade::where('id',$id)->get('class_name');
        return $class[0]['class_name'];
    }
}
