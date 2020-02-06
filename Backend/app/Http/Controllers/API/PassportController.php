<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\TeacherRequest;
use Auth;
use DB;

class PassportController extends Controller
{

    public $successStatus = 200;
    public function registerTeacher(Request $request){
        $validator = Validator::make($request->all(),[
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->certification = $request->certification;
        $teacher->instruments = $request->instruments;
        $teacher->password = bcrypt($request->password);
        $teacher->save();
        $success['token'] = $teacher->createToken('MyApp')->accessToken;
        $success['name'] = $teacher->name;
        return response()->json(['success' => $success],$this->successStatus);
    }
    public function registerStudent(StudentRequest $request){
        $validator = Validator::make($request->all(),[
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->save();
        $success['token'] = $student->createToken('MyApp')->accessToken;
        $success['name'] = $student->name;
        return response()->json(['success' => $success],$this->successStatus);
    }
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = $user -> createToken('MyApp')->accessToken;
            return response()->json(['success' => $success],$this->successStatus);
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 401);
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
        return response()->json(['success' => 'Deslogado'], 204);
    }
}
