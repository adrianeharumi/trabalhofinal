<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\Rating;
use App\Commentary;

class Student extends User
{
  public function teachers()
  {
    return $this->belongsToMany('App\Teacher')->withTimestamps();
  }

  public function rating()
  {
    return $this->hasOne('App\Rating');
  }

  public function commentaries()
  {
     return $this->belongsToMany('App\Commentary');
  }
  public function updateStudent(Request $req){
      if ($req->name)
          $this->name = $req->name;
      if ($req->email)
          $this->email = $req->email;
      if ($req->password)
          $this->password = $req->password;
      if ($req->number)
          $this->number = $req->number;
      if ($req->birth)
          $this->birth = $req->birth;
      if ($req->CPF)
          $this->CPF = $req->CPF;
      $this->save();
  }




}
