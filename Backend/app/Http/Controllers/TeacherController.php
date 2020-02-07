<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\Validator;
use App\Teacher;

class TeacherController extends Controller
{
  public function listTeacher(){
    $teacher = new Teacher();
    return response()->json([$teacher->listTeachers()]);
  }
  public function showTeacher($id){
    $teacher = new Teacher();
    return response()->json([$teacher->showTeacher($id)]);
  }

  public function updateTeacher(TeacherRequest $request, $id){
    $teacher = Teacher::find($id);
    $teacher->updateTeacher($request, $id);
    return response()->json([$teacher]);
  }
}
