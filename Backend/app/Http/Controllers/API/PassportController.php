<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\TeacherRequest;
use App\Teacher;
use App\User;
use App\Student;
use Auth;
use DB;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function registerStudent(StudentRequest $request ) {
      $validator = Validator::make($request->all(),[
        
        ]);
        if($validator->fails()){
          return response()->json($validator->errors());
        }
      
      $student = new Student();
    	$student->name = $request->name;
    	$student->email = $request->email;
    	$student->password = bcrypt( $request->password );
      $student->save();

    	return response()->json([
			'message' => 'Usuário '.$student->name.' criado com sucesso!',
			'data' => $student
		], 200);

    }
    public function registerTeacher(TeacherRequest $request ) {
      $validator = Validator::make($request->all(),[
        
        ]);
        if($validator->fails()){
          return response()->json($validator->errors());
        }

    	$teacher = new Teacher();
    	$teacher->name = $request->name;
    	$teacher->email = $request->email;
      $teacher->password = bcrypt( $request->password );
      $teacher->instruments = $request->instruments;
      $teacher->certification = $request->certification;
      $teacher->save();

    	return response()->json([
			'message' => 'Usuário '.$teacher->name.' criado com sucesso!',
			'data' => $teacher
		], 200);

    }
    public function login( Request $request ) {

    	$fields = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];

    	$access = Auth::attempt( $fields );
    	if ( $access ) {

    		$user = Auth::user();
    		$token = $user->createToken('MyApp')->accessToken;

    		return response()->json( [
                "message" => "Login realizado com sucesso!",
                "data" => [
                	'user' => $user,
                	'token' => $token
                ]
            ], 200 );

    	} else {

    		return response()->json( [
                "message" => "Email ou senha inválidos!",
                "data" => null,
                "return" => $access,
            ], 401 );

    	}

    }
    public function getDetails(){
        $user = Auth::user();
        return response()->json(['success'=>$user],$this->successStatus);
    }

    public function logout(){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json( [
          "message" => "Logout realizado com sucesso!",
      ], 200 );

    }
}
