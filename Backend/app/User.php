<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

use Laravel\Passport\HasApiTokens;
use Illuminate\Http\Request;

use App\Student;
use App\Teacher;

class User extends Authenticatable
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
    public function student()
    {
      return $this->hasOne('App\Student');
    }
    public function teacher()
    {
      return $this->hasOne('App\Teacher');
    }


    public function createUser(UserRequest $req)
    {
      $validator = Validator::make($req->all(),[
          ]);
      if($validator->fails()){
          return response()->json($validator->errors());
      }
        $this->name = $req->name;
        $this->email = $req->email;
        $this->password = bcrypt($req->password);
        $this->save();
    }
    public function updateUser(UserRequest $req, $id)
    {
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
      return;
    }
}
