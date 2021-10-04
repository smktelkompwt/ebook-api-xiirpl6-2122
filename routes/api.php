<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Basic formula pembuatan route
 */
// Route::{{method}}}('{{uri}}','{{closure}}}');
// Route::{{method}}}('{{uri}}','{{nameController@nameFunction}}}');

Route::get('/web', function () {
    return [
        "status" => "200",
        "message" => "Ini URI pertama"
    ];
});

Route::post('/web', function () {
    return [
        "status" => "200",
        "message" => "Ini URI pertama pake post"
    ];
});


Route::get('/controller', 'App\Http\Controllers\ProfileController@index');

// Route::get('/namas', 'App\Http\Controllers\NamaFullController@index');
// Route::post('/namas', 'App\Http\Controllers\NamaFullController@store');
// Route::get('/namas/orangtua', 'App\Http\Controllers\NamaFullController@orangtua');
// Route::get('/namas/{id}', 'App\Http\Controllers\NamaFullController@show');
// Route::put('/namas/{id}', 'App\Http\Controllers\NamaFullController@update');
// Route::delete('/namas/{id}', 'App\Http\Controllers\NamaFullController@destroy');

Route::resource('namas', 'App\Http\Controllers\NamaFullController');
Route::resource('teachers', 'App\Http\Controllers\TeacherController')->except('create', 'edit');


Route::resource('register', 'App\Http\Controllers\AuthController');
