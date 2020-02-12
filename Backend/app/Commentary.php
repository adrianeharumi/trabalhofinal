<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Student;
use App\Teacher;

class Commentary extends Model
{
    public function student(){
      return $this -> belongsTo('App\Student');
    }
    public function teacher()
    {
      return $this -> belongsTo('App\Teacher');
    }
    public function createQuestion(Request $req, $user, $teacher_id){
      $this->question = $req->question;
      $this->teacher_id = $teacher_id;
      $this->student_name = $user->name;
      $student = $user->student;
      $this->student_id = $student->id;
      $this->save();
      return;
    }
    public function createAnswer(Request $req, $question_id, $user){
      $this->answer = $req->answer;
      $this->teacher_name = $user->name;
      $this->save();
      return;
    }
}
