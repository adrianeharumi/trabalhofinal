<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Teacher;
use App\Rating;
use App\Commentary;
use App\User;

class Student extends User
{
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher')->withPivot('price', 'teacher_name', 'lessons_quant');
    }
    
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function commentaries()
    {
        return $this->belongsToMany('App\Commentary');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
