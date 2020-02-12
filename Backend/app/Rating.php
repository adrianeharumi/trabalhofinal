<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\User;

class Rating extends Model
{
    public function student()
    {
        return $this -> belongsTo('App\Student');
    }
    public function teacher()
    {
        return $this -> belongsTo('App\Teacher');
    }
    public function createRating(Request $req, $user, $teacher_id){
      $this->grade = $req ->grade;
      $this->text = $req->text;
      $this->teacher_id = $teacher_id;
      $this->student_name = $user->name;
      $student = $user->student;
      $this->student_id = $student->id;
      $this->save();
      return;
    }
}
