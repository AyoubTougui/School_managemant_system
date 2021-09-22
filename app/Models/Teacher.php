<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'gender',
        'phone',
        'dateofbirth',
        'current_address',
        'permanent_address'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
