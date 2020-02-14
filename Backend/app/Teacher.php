<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Student;
use App\Rating;
use App\Commentary;
use App\User;


use Auth;

class Teacher extends User
{
    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
    public function commentaries()
    {
        return $this->hasMany('App\Commentary');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function updateTeacher(Request $req)
    {

        
        $this->save();
    }

    public function createTeacher(TeacherRequest $req)
    {
        $validator = Validator::make($req->all(), [
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $this->instruments = $req ->instruments;
        $this->certification = $req->certification;
        $this->zone = $req->zone;
        $this->save();
    }
}
