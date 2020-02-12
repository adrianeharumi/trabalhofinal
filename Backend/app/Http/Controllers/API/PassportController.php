<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UserRequest;
use App\Teacher;
use App\Notifications\Register;
use App\User;
use App\Student;
use Auth;
use DB;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function registerTeacher(TeacherRequest $request)
    {
        $user = new User;
        $user->createUser($request);
        $teacher = new Teacher;
        $teacher->createTeacher($request);
        $teacher->user_id = $user->id;
        $teacher->save();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $user->notify(new Register($user));
        return response()->json(['success' => $success], $this->successStatus);
    }
    public function registerStudent(UserRequest $request)
    {
        $user = new User;
        $user->createUser($request);
        $student = new Student;
        $student->user_id = $user->id;
        $student->save();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $user->notify(new Register($user));
        return response()->json(['success' => $success], $this->successStatus);
    }
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user -> createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    //Função que retorna as info do usuario separado das infos do professor, por isso a necessidade do find
    public function getDetailsTeacher()
    {
        $user = Auth::user();
        return response()->json(['dados do usuario' => User::find($user->id), 'dados do professor' => $user->teacher], $this->successStatus);
    }
    public function getDetailsStudent()
    {
        $user = Auth::user();
        return response()->json(['dados do usuario' => User::find($user->id), 'dados do aluno' => $user->student], $this->successStatus);
    }

    public function logout()
    {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json([
          "message" => "Logout realizado com sucesso!",
      ], 200);
    }
}
