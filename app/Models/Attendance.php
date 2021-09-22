<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'planning_id',
        'student_id', 
        'attendance_date',
        'attendance_status'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function planning() {
        return $this->belongsTo(planning::class);
    }
}
