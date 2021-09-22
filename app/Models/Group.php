<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'id_class'
    ]; 

    public function class()
    {
        return $this->belongsTo(Grade::class);
    }
   
    public function exam()
    {
        return $this->belongsTo(exam::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function CLassName($id)
    {
        $class = Grade::where('id',$id)->get('class_name');
        return $class[0]['class_name'];
    }

}
