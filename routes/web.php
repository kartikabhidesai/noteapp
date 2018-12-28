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

//Note
Route::match(['get', 'post'], 'note', ['as' => 'note', 'uses' => 'note\NoteController@index']);
Route::match(['get', 'post'], 'add-note', ['as' => 'add-note', 'uses' => 'note\NoteController@addnote']);
Route::match(['get', 'post'], 'edit-note/{id}', ['as' => 'edit-note', 'uses' => 'note\NoteController@editnote']);
Route::match(['get', 'post'], 'view-note/{id}', ['as' => 'view-note', 'uses' => 'note\NoteController@viewnote']);
Route::match(['get', 'post'], 'delete-note', ['as' => 'delete-note', 'uses' => 'note\NoteController@deletenote']);

//File
Route::match(['get', 'post'], 'file', ['as' => 'file', 'uses' => 'file\FileController@index']);
Route::match(['get', 'post'], 'add-file', ['as' => 'add-file', 'uses' => 'file\FileController@addfile']);
Route::match(['get', 'post'], 'edit-file/{id}', ['as' => 'edit-file', 'uses' => 'file\FileController@editfile']);
Route::match(['get', 'post'], 'delete-file', ['as' => 'delete-file', 'uses' => 'file\FileController@deletefile']);
Route::match(['get', 'post'], 'download-file/{id}', ['as' => 'download-file', 'uses' => 'file\FileController@downloadfile']);

//Image
Route::match(['get', 'post'], 'imagedraw', ['as' => 'imagedraw', 'uses' => 'imagedraw\ImagedrawController@index']);

});

