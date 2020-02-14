<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Teacher;
use App\User;
use App\Rating;
use App\Commentary;
use Auth;
use Carbon\Carbon;

class TeacherController extends Controller
{
    public function listTeacherInstrumentsByZone($instruments, $zone){
        $teachers = Teacher::all()->where('zone', $zone)->where('instruments', $instruments);
        $array = [];
        $cont =0;
        foreach ($teachers as $teacher) {
            $user = new User;
            $user = User::where('id', $teacher->user_id)->get();
            $teacher->user = $user;
            $avg = Rating::where('teacher_id', $teacher->id)->avg('grade');
            $teacher->average = $avg;
            $array[$cont] = $teacher;
            $cont++;
        }
        return response()->json(['array' => $array]);
    }
    public function listTeacherInstruments($instruments){
        $teachers = Teacher::all()->where('instruments', $instruments);
        $array = [];
        $cont=0;
        foreach ($teachers as $teacher) {
            $user = new User;
            $user = User::where('id', $teacher->user_id)->get();
            $teacher->user = $user;
            $avg = Rating::where('teacher_id', $teacher->id)->avg('grade');
            $teacher->average = $avg;
            $array[$cont] = $teacher;
            $cont++;
        }
        return response()->json(['array' => $array]);
    }
    public function showTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $user = User::where('id', $teacher->user_id)->get();
        $teacher->user = $user;
        $rate = Rating::where('teacher_id', $teacher->id)->get();
        $teacher->rate = $rate;
        $question = Commentary::where('teacher_id', $teacher->id)->get();
        $teacher->questions = $question;
        $avg = Rating::where('teacher_id', $teacher->id)->avg('grade');
        $teacher->average = $avg;
        return response()->json(['teacher' => $teacher]);
    }
    public function updateTeacher(Request $req)
    {
        $user = Auth::user();
        $teacher = $user->teacher;
        $user->updateUser($req);
        if($teacher)
        {
        if ($req->lesson_price) {
            $teacher->lesson_price = $req->lesson_price;
        }
        if ($req->rent_price) {
            $teacher->rent_price = $req->rent_price;
        }
        if ($req->description) {
            $teacher->description = $req->description;
        }
        if ($req->district) {
            $teacher->district = $req->district;
        }
        if ($req->zone) {
            $teacher->zone = $req->zone;
        }
        if ($req->video) {
            $teacher->video = $req->video;
        }
        if ($req->instruments) {
            $teacher->instruments = $req->instruments;
        }
        if ($req->certification) {
            $teacher->certification = $req->certification;
        }
        if ($req->owner_name) {
            $teacher->owner_name = $req->owner_name;
        }
        if ($req->bank) {
            $teacher->bank = $req->bank;
        }
        if ($req->agency) {
            $teacher->agency = $req->agency;
        }
        if ($req->account) {
            $teacher->account = $req->account;
        }
      }

        $teacher->save();
        return response()->json(['dados do usuario' => $teacher->user, 'dados do professor' => Teacher::find($teacher->id)]);
    }

    public function deleteVideo()
    {
        $user = Auth::user();
        $teacher = $user->teacher;
        Storage::delete($teacher->video);
        $teacher->video = null;
        $teacher->save();
        return response()->json(['Video deletado']);
    }

    public function answer(Request $req, $question_id){
      $answer = Commentary::find($question_id);
      $user = Auth::user();
      $current = new Carbon();
      $answer->time_teacher = $current;
      $answer->createAnswer($req, $question_id, $user);
      return response()->json([$answer]);
    }
    public function showVideo()
    {
        $user = Auth::user();
        $teacher = $user->teacher;
        return Storage::download($teacher->video);
    }
}
