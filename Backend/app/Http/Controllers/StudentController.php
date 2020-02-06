<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\API\PassportController;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
  public function updateStudent(StudentRequest $request, $id){
    $validator = Validator::make($request->all(),[
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }
    $student = Student::find($id);
    $student->updateStudent($request, $id);
    return response()->json([$student]);
  }
}
