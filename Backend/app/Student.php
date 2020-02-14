<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Teacher;
use App\Rating;
use App\Commentary;
use App\User;

class Student extends User
{
    use Notifiable;

    public function teachers()
    {
        return $this->belongsToMany('App\Teacher')->withPivot('price', 'teacher_name', 'lessons_quant')->withTimestamps();;
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function commentaries()
    {
        return $this->belongsToMany('App\Commentary');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function updateStudent(Request $req, $id)
   {

       if ($req->number_credit_card) {
           $this->number_credit_card = $req->number_credit_card;
       }
       if ($req->cvv) {
           $this->cvv = $req->cvv;
       }
       if ($req->owner_name) {
           $this->owner_name = $req->owner_name;
       }
       if ($req->due_date) {
           $this->due_date = $req->due_date;
       $this->save();
       return;
   }
}
}
