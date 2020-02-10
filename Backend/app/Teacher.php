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


    public function updateTeacher(TeacherRequest $req, $id)
    {
        $validator = Validator::make($req->all(), [
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $teacher = Teacher::find($id);
        $user = $teacher->user;
        $user->updateUser($req, $user->id);
        if ($req->lesson_price) {
            $this->lesson_price = $req->lesson_price;
        }
        if ($req->rent_price) {
            $this->rent_price = $req->rent_price;
        }
        if ($req->description) {
            $this->description = $req->description;
        }
        if ($req->district) {
            $this->district = $req->district;
        }
        if ($req->zone) {
            $this->zone = $req->zone;
        }
        if ($req->instruments) {
            $this->instruments = $req->instruments;
        }
        if ($req->certification) {
            $this->certification = $req->certification;
        }
        if ($req->video) {
            if (!Storage::exists('localVideos')) {
                Storage::makeDirectory('localVideos', 0775, true);
            }
            Storage::delete($this->video);
            $file = $req->file('video');
            $filename = $this->id.".".$file->getClientOriginalExtension();
            $path = $file->storeAs('localVideos', $filename);
            $this->video = $path;
        }
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
        $this->save();
    }
}