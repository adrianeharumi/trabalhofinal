<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\API\PassportController;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Validator;
use App\User;

class StudentController extends Controller
{
    public function updateStudent(StudentRequest $req, $id)
    {
        $student = Student::find($id);
        $user = $student->user;
        $user->updateUser($req, $user->id);
        return response()->json(['dados do usuario' => $student->user, 'dados do professor' => Student::find($id)]);
    }
    public function deletePhoto($id)
    {
        $student = Student::find($id);
        $user = $student->user;
        $user->deletePhoto($user->id);
        return response()->json(['Foto deletada']);
    }
    public function showPhoto($id)
    {
        $student = Student::find($id);
        $user = $student->user;
        return $user->showPhoto($user->id);
    }
}
