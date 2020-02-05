<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Teacher;

class Rating extends Model
{
    public function student(){
      return $this -> hasOne('App\Student');
    }
    public function teacher(){
      return $this -> belongsTo('App\Teacher');
    }
}
