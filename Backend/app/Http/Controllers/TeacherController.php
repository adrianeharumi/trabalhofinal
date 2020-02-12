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
        $teachers = Teacher::where('zone', $zone)->where('instruments', $instruments)->paginate(10);
        $array = [];
        $cont =0;
        $last = $teachers->lastPage();
        foreach ($teachers as $teacher) {
            $user = new User;
            $user = User::where('id', $teacher->user_id)->get();
            $teacher->user = $user;
            $avg = Rating::where('teacher_id', $teacher->id)->avg('grade');
            $teacher->average = $avg;
            $array[$cont] = $teacher;
            $cont++;
        }
        return response()->json([$array, $last]);
    }
    public function listTeacherInstruments($instruments){
        $teachers = Teacher::where('instruments', $instruments)->paginate(10);
        $array = [];
        $cont=0;
        $last = $teachers->lastPage();
        foreach ($teachers as $teacher) {
            $user = new User;
            $user = User::where('id', $teacher->user_id)->get();
            $teacher->user = $user;
            $avg = Rating::where('teacher_id', $teacher->id)->avg('grade');
            $teacher->average = $avg;
            $array[$cont] = $teacher;
            $cont++;
        }
        return response()->json([$array, $last]);
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
        return response()->json([$teacher]);
    }
    public function updateTeacher(TeacherRequest $request)
    {
        $user = Auth::user();
        $teacher = $user->teacher;
        $teacher->updateTeacher($request, $teacher->id);
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
