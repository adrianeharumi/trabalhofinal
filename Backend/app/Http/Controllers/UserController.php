<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Commentary;
use App\User;

class UserController extends Controller
{
    public function showPhoto()
    {
        $user = Auth::user();
        return $user->showPhoto($user->id);
    }
    public function deletePhoto()
    {
        $user = Auth::user();
        $user->deletePhoto($user->id);
        return response()->json(['Foto deletada']);
    }
    public function deleteUser($id){
      $user = Auth::user();
      User::destroy($id);
      return response()->json(['User deleteado']);
    }
    public function deleteCommentary($id){
      $user = Auth::user();
      Commentary::destroy($id);
      return response()->json(['Comentario deleteado']);
    }
}
