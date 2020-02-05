<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Teacher;
use App\Rating;
use App\Commentary;

class Student extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

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
  public function createStudent(Request $request){
      $this->name = $request->name;
      $this->email = $request->email;
      $this->password = $request->password;
      $this->save();
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
