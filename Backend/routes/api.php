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
Route::post('register', 'Api\PassportController@register');

Route::post('login', 'Api\PassportController@login');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', 'Api\PassportController@logout');
    Route::post('getDetails', 'Api\PassportController@getDetails');
    Route::post('updateTeacher', 'StudentController@updateTeacher');
    Route::post('updateStudent', 'StudentController@updateStudent');
});
