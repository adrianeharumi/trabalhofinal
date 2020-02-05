<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Teacher;

class Commentary extends Model
{
    public function student(){
      return $this -> belongsTo('App\Student');
    }
    public function teacher()
    {
      return $this -> belongsTo('App\Teacher')
    }
}
