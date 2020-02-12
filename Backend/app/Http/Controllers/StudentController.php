<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\API\PassportController;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use App\Commentary;
use App\Rating;
use App\Teacher;
use Carbon\Carbon;
use App\Notifications\Buy;


class StudentController extends Controller
{


    public function updateStudent(StudentRequest $req)
    {
        $user = Auth::user();
        $user->updateUser($req, $user->id);
        return response()->json(['dados do usuario' => User::find($user->id), 'dados do estudante' => $user->student]);
    }
    public function rate(Request $req, $teacher_id){
        $rate = new Rating;
        $user = Auth::user();
        $rate->createRating($req, $user, $teacher_id);
        return response()->json([$rate]);
    }
    public function ask(Request $req, $teacher_id){
      $question = new Commentary;
      $user = Auth::user();
      $current = new Carbon('America/Sao_Paulo');
      $question->time_student = $current;
      $question->createQuestion($req, $user, $teacher_id);
      return response()->json([$question]);
    }

    public function createContract($teacher_id, $times, $boolean){
        $user = Auth::user();
        $student = $user->student;
        $student->teachers()->attach($teacher_id);
        $teacher = Teacher::find($teacher_id);
        $user = $teacher->user;
        $student->teachers()->updateExistingPivot($teacher_id, array('lessons_quant' => $times), false);
        $student->teachers()->updateExistingPivot($teacher_id, array('teacher_name' => $user->name), false);
        if($boolean && $teacher->rent_price){
            $priceTotal = $times*($teacher->lesson_price + $teacher->rent_price);
            $student->teachers()->updateExistingPivot($teacher_id, array('price' => $priceTotal), false);
        }
        else{
            $priceTotal = $times*($teacher->lesson_price);
            $student->teachers()->updateExistingPivot($teacher_id, array('price' => $priceTotal), false);
        }
        $user2 = $student->user;
        $user2->notify(new Buy($user));
        return response()->json(['contract' => 'Contrato Firmado', 'price' => $priceTotal]);
    }

    public function showContracts(){
        $user = Auth::user();
        $student = $user->student;
        $pivot = $student->teachers()->where('student_id', $student->id)->get();
        return response()->json([$pivot]);
    }


}
