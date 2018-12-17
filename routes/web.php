<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function() {
    return Redirect::to('login');
});
//Route::get('/', function() { return Redirect::to('login'); });

Route::match(['get', 'post'], 'login', ['as' => 'login', 'uses' => 'LoginController@auth']);
Route::match(['get', 'post'], 'register', ['as' => 'register', 'uses' => 'LoginController@register']);
Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'LoginController@getLogout']);
$userPrefix = "";
Route::group(['prefix' => $userPrefix, 'middleware' => ['auth']], function() {
Route::match(['get', 'post'], 'dashboard', ['as' => 'dashboard', 'uses' => 'UserController@dashboard']);
});

//Note
Route::match(['get', 'post'], 'note', ['as' => 'note', 'uses' => 'note\NoteController@index']);

//Note
Route::match(['get', 'post'], 'file', ['as' => 'file', 'uses' => 'file\FileController@index']);

//Note
Route::match(['get', 'post'], 'imagedraw', ['as' => 'imagedraw', 'uses' => 'imagedraw\ImagedrawController@index']);
