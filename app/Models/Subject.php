<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name'
    ];

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function class()
    {
        return $this->belongsTo(GradeSubject::class);
    }

    public function exam()
    {
        return $this->belongsTo(exam::class);
    }
}
