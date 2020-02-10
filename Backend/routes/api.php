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


Route::get('listTeacher', 'TeacherController@listTeacher');
Route::get('showTeacher/{id}', 'TeacherController@showTeacher');
Route::post('registerTeacher', 'Api\PassportController@registerTeacher');


Route::post('login', 'Api\PassportController@login');


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('showPhoto/{id}', 'TeacherController@showPhoto');
    Route::get('showPhoto/{id}', 'StudentController@showPhoto');
    Route::post('logout', 'Api\PassportController@logout');
    Route::post('getDetailsStudent', 'Api\PassportController@getDetailsStudent');
    Route::post('getDetailsTeacher', 'Api\PassportController@getDetailsTeacher');
    Route::put('updateTeacher/{id}', 'TeacherController@updateTeacher');
    Route::put('updateStudent/{id}', 'StudentController@updateStudent');
    Route::delete('deletePhoto/{id}', 'TeacherController@deletePhoto');
    Route::delete('deletePhoto/{id}', 'StudentController@deletePhoto');
    Route::delete('deleteVideo/{id}', 'TeacherController@deleteVideo');
});
