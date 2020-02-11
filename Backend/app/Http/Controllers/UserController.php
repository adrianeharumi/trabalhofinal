<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
}
