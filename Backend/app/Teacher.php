<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Student;
use App\Rating;
use App\Commentary;
use App\User;

class Teacher extends Authenticatable
{
  use Notifiable;
  use HasApiTokens;

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

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
    public function students(){
        return $this->belongsToMany('App\Student')->withTimestamps();
    }
    public function ratings(){
      return $this->hasMany('App\Rating');
    }
    public function commentaries(){
      return $this->hasMany('App\Commentary');
    }

    public function updateTeacher(Request $req){
        $validator = Validator::make($request->all(),[
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
        if ($req->lesson_price)
            $this->lesson_price = $req->lesson_price;
        if ($req->rent_price)
            $this->rent_price = $req->rent_price;
        if ($req->description)
            $this->description = $req->description;
        if ($req->district)
            $this->district = $req->district;
        if ($req->zone)
            $this->zone = $req->zone;
        if ($req->instruments)
            $this->instruments = $req->instruments;
        if ($req->certification)
            $this->certification = $req->certification;
        $this->save();
    }
    public function listTeachers(){
      $paginator = Teacher::paginate(10);
      return response()->json([$paginator]);
    }
    public function showTeacher($id){
      $teacher = Teacher::findOrFail($id);
      return response()->json([$teacher]);
    }

}
