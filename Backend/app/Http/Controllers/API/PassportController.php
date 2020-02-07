<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use App\Student;
use Auth;
use DB;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function register( Request $request ) {
    	$user = new Student();

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt( $request->password );
      $user->save();

    	return response()->json([
			'message' => 'Usuário '.$user->name.' criado com sucesso!',
			'data' => null
		], 200);

    }
    public function login( Request $request ) {

    	$fields = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];

    	$access = Auth::attempt( $fields );
      echo $access;
    	if ( $access ) {

    		$user = Auth::teacher();
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
        $user = Auth::teacher();
        return response()->json(['success'=>$user],$this->successStatus);
    }
    public function logout(){
        $accessToken = Auth::teacher()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json(['success' => 'Deslogado'], 204);
    }
}
