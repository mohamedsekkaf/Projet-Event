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
Route::group(['middleware' => ['auth']], function(){
Route::get('/', function () {
    return view('home');
});
Route::get('/', 'PostController@index');
Route::get('/ShowPost/{slug}' , 'PostController@ShowPost');
Route::get('/AjouterPost', 'PostController@AjouterPostInfo');
Route::post('/AjouterPost', 'PostController@AjouterPost');
Route::get('/profile/{user}','PostController@profile');
Route::post('/EditUser','PostController@EditUser');
Route::post('/EditUserEmail','PostController@EditUserEmail');
Route::post('/EditImageUser','PostController@EditImageUser');
Route::post('/EditUserPass','PostController@EditUserPass');
Route::post('/AddComment','CommentController@AddComment');
Route::post('/AddFollow','PostController@Addfollow');
Route::post('/AddFollowHome','PostController@AddFollowHome');
Route::post('/DeletePost','PostController@DeletePost');

Route::post('/UpdateTitlePost','PostController@UpdateTitlePost');
Route::post('/UpdateDescriptionPost','PostController@UpdateDescriptionPost');
Route::post('/UpdateCategoryPost','PostController@UpdateCategoryPost');
Route::post('/UpdateImagePost','PostController@UpdateImagePost');
Route::post('/AddFollowProfile','PostController@AddFollowProfile');






});






Auth::routes();


