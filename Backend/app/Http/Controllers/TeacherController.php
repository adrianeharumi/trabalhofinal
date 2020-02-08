<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Validator;
use App\Teacher;
use App\User;

class TeacherController extends Controller
{
  public function listTeacher(){
    $teachers = Teacher::paginate(10);
    $array = [];
    $cont =0;
    $last = $teachers->lastPage();
    foreach ($teachers as $teacher) {
        $user = new User;
        $user = User::where('id', $teacher->user_id)->get();
        $teacher->user = $user;
        $array[$cont] = $teacher;
        $cont++;
    }
    return response()->json([$array, $last]);
  }
  public function showTeacher($id){
    $teacher = Teacher::findOrFail($id);
    $user = User::where('id', $teacher->user_id)->get();
    $teacher->user = $user;
    return response()->json([$teacher]);
  }
  public function updateTeacher(TeacherRequest $request, $id){
    $teacher = Teacher::find($id);
    $teacher->updateTeacher($request, $id);
    return response()->json(['dados do usuario' => $teacher->user, 'dados do professor' => Teacher::find($id)]);
  }
}
