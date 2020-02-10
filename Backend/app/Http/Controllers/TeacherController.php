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

class TeacherController extends Controller
{
    public function listTeacher()
    {
        $teachers = Teacher::paginate(10);
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
    public function listTeacherZone($zone){
        $teachers = Teacher::where('zone', $zone)->get();
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
        return response()->json([$array]);
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
    public function updateTeacher(TeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->updateTeacher($request, $id);
        return response()->json(['dados do usuario' => $teacher->user, 'dados do professor' => Teacher::find($id)]);
    }

    public function deletePhoto($id)
    {
        $teacher = Teacher::find($id);
        $user = $teacher->user;
        $user->deletePhoto($user->id);
        return response()->json(['Foto deletada']);
    }
    public function deleteVideo($id)
    {
        $teacher=Teacher::find($id);
        Storage::delete($teacher->video);
        $teacher->video = null;
        $teacher->save();
        return response()->json(['Video deletado']);
    }
    public function showPhoto($id)
    {
        $teacher = Teacher::find($id);
        $user = $teacher->user;
        return $user->showPhoto($user->id);
    }
    public function answer(Request $req, $question_id){
      $answer = Commentary::find($question_id);
      $user = Auth::user();
      $answer->createAnswer($req, $question_id, $user);
      return response()->json([$answer]);
    }
}
