<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'class_name'
    ];

    protected $casts = [
        'class_name' => 'string'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function Groups($id){
        $groups = Group::where('id_class',$id)->get();
        return $groups;
    }
}
