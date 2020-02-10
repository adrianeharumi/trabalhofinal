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


Route::get('listTeacherZone/{zone}', 'TeacherController@listTeacherZone');
Route::get('showTeacher/{id}', 'TeacherController@showTeacher');
Route::get('listTeacherInstruments/{instruments}', 'TeacherController@listTeacherInstruments');
Route::post('registerTeacher', 'Api\PassportController@registerTeacher');


Route::post('login', 'Api\PassportController@login');


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('showPhoto', 'UserController@showPhoto');
    Route::get('showContracts', 'StudentController@showContracts');
    Route::post('logout', 'Api\PassportController@logout');
    Route::post('getDetailsStudent', 'Api\PassportController@getDetailsStudent');
    Route::post('getDetailsTeacher', 'Api\PassportController@getDetailsTeacher');
    Route::post('rate/{teacher_id}', 'StudentController@rate');
    Route::post('ask/{teacher_id}', 'StudentController@ask');
    Route::post('answer/{question_id}', 'TeacherController@answer');
    Route::post('createContract/{teacher_id}', 'StudentController@createContract');
    Route::put('updateTeacher/{id}', 'TeacherController@updateTeacher');
    Route::put('updateStudent/{id}', 'StudentController@updateStudent');
    Route::delete('deletePhoto', 'UserController@deletePhoto');
    Route::delete('deleteVideo/{id}', 'TeacherController@deleteVideo');
});
