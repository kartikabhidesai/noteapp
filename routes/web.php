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
Route::match(['get', 'post'], 'forgotpassword', ['as' => 'forgotpassword', 'uses' => 'LoginController@forgotpassword']);
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
Route::match(['get', 'post'], 'imagedrawlist', ['as' => 'imagedrawlist', 'uses' => 'imagedraw\ImagedrawController@imagedrawlist']);
Route::match(['get', 'post'], 'imagedraw', ['as' => 'imagedraw', 'uses' => 'imagedraw\ImagedrawController@imagedrawadd']);
Route::match(['get', 'post'], 'savedrawimage', ['as' => 'savedrawimage', 'uses' => 'imagedraw\ImagedrawController@savedrawimage']);
Route::match(['get', 'post'], 'deletedrawimage', ['as' => 'deletedrawimage', 'uses' => 'imagedraw\ImagedrawController@deletedrawimage']);
Route::match(['get', 'post'], 'edit-file/{id}', ['as' => 'edit-file', 'uses' => 'imagedraw\ImagedrawController@editimage']);


Route::match(['get', 'post'], 'deletesheet', ['as' => 'deletesheet', 'uses' => 'spreadsheet\SpreadsheetController@deletesheet']);
Route::match(['get', 'post'], 'view-sheet/{id}', ['as' => 'view-sheet', 'uses' => 'spreadsheet\SpreadsheetController@spreadsheetlistview']);
Route::match(['get', 'post'], 'edit-sheet/{id}', ['as' => 'edit-sheet', 'uses' => 'spreadsheet\SpreadsheetController@spreadsheetlistedit']);
Route::match(['get', 'post'], 'ajaxcall', ['as' => 'ajaxcall', 'uses' => 'spreadsheet\SpreadsheetController@ajaxcall']);
Route::match(['get', 'post'], 'ajaxcalledit', ['as' => 'ajaxcalledit', 'uses' => 'spreadsheet\SpreadsheetController@ajaxcalledit']);
Route::match(['get', 'post'], 'spreadsheet', ['as' => 'spreadsheet', 'uses' => 'spreadsheet\SpreadsheetController@spreadsheetlist']);
Route::match(['get', 'post'], 'add-sheet', ['as' => 'add-sheet', 'uses' => 'spreadsheet\SpreadsheetController@spreadsheetlistadd']);

//Admin
Route::match(['get', 'post'], 'userlist', ['as' => 'userlist', 'uses' => 'admin\UserController@index']);
Route::match(['get', 'post'], 'admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'admin\UserController@dashborad']);
Route::match(['get', 'post'], 'ajaxAction', ['as' => 'ajaxAction', 'uses' => 'admin\UserController@ajaxAction']);
Route::match(['get', 'post'], 'viewuser/{id}', ['as' => 'viewuser', 'uses' => 'admin\UserController@viewuser']);
Route::match(['get', 'post'], 'chagepassword/{id}', ['as' => 'chagepassword', 'uses' => 'admin\UserController@changepassword']);
Route::match(['get', 'post'], 'edituser/{id}', ['as' => 'edituser', 'uses' => 'admin\UserController@edituser']);

});