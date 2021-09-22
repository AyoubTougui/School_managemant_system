<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'parent_id',
        'class_id',
        'group_id',
        'gender',
        'phone',
        'dateofbirth',
        'current_address'
    ];

    public function user()  
    {
        return $this->belongsTo(User::class);
    }

    public function parent() 
    {
        return $this->belongsTo(Parents::class);
    }

    public function class() 
    { 
        return $this->belongsTo(Grade::class, 'class_id');
    }
    
    public function group() 
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function attendances() 
    {
        return $this->hasMany(Attendance::class);
    }

    
}
