<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
  

    public function createUser(Request $req)
    {
        $this->name = $req->name;
        $this->email = $req->email;
        $this->password = bcrypt($req->password);
        $this->save();
    }
}
