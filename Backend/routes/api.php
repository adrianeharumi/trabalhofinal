<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registerStudent', 'Api\PassportController@registerStudent');


Route::get('listTeacherInstrumentsByZone/{instruments}/{zone}', 'TeacherController@listTeacherInstrumentsByZone');
Route::get('showTeacher/{id}', 'TeacherController@showTeacher');
Route::get('listTeacherInstruments/{instruments}', 'TeacherController@listTeacherInstruments');
Route::post('registerTeacher', 'Api\PassportController@registerTeacher');


Route::post('login', 'Api\PassportController@login');


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('showPhoto', 'UserController@showPhoto');
    Route::get('showVideo', 'TeacherController@showVideo');
    Route::get('createContract/{teacher_id}/{times}/{boolean}', 'StudentController@createContract');
    Route::get('showContracts', 'StudentController@showContracts')->middleware('student');
    Route::get('getDetailsStudent', 'Api\PassportController@getDetailsStudent')->middleware('student');
    Route::get('getDetailsTeacher', 'Api\PassportController@getDetailsTeacher')->middleware('teacher');
    Route::post('logout', 'Api\PassportController@logout');
    Route::post('rate/{teacher_id}', 'StudentController@rate')->middleware('student');
    Route::post('ask/{teacher_id}', 'StudentController@ask')->middleware('student');
    Route::post('answer/{question_id}', 'TeacherController@answer')->middleware('teacher');
    Route::put('updateTeacher', 'TeacherController@updateTeacher')->middleware('teacher');
    Route::put('updateStudent', 'StudentController@updateStudent')->middleware('student');
    Route::delete('deletePhoto', 'UserController@deletePhoto');
    Route::delete('deleteVideo', 'TeacherController@deleteVideo')->middleware('teacher');
    Route::delete('deleteUser/{id}', 'UserController@deleteUser')->middleware('admin');
    Route::delete('deleteCommentary/{id}', 'UserController@deleteCommentary')->middleware('admin');

});
