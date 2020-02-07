<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Teacher;
use App\Rating;
use App\Commentary;
use App\User;


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
  public function updateStudent(StudentRequest $req){
    $validator = Validator::make($req->all(),[
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }
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
