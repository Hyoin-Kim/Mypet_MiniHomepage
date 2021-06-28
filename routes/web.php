<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::put('/homepage/delete-timeline-comment','HomepageController@deleteTimelineComment');
Route::put('/homepage/delete-guestbook-comment','HomepageController@deleteGuestbookComment');
Route::put('/homepage/delete-guestbook','HomepageController@deleteGuestbook');
Route::put('/homepage/delete-timeline','HomepageController@deleteTimeline');
Route::put('/homepage/delete-photo','HomepageController@deletePhoto');
Route::post('/homepage/add-guestbook-comment','HomepageController@addGuestbookComment');
Route::post('/homepage/add-timeline-comment','HomepageController@addTimelineComment');
Route::post('/homepage/add-guestbook','HomepageController@addGuestBook');
Route::post('/homepage/add-photo','HomepageController@addPhoto');
Route::post('/homepage/search-friends','HomepageController@searchFriends');
Route::post('/homepage/add-timeline','HomepageController@addTimeline');
Route::get('/homepage/friend-main/{id}','HomepageController@friendMain');
Route::get('/homepage/main','HomepageController@getMain');
Route::resource('/homepage','HomepageController');


Route::put('/info/update-profile','InfoController@updateProfile');
Route::get('/info/message','InfoController@getMessage');
Route::get('/info/mypage','InfoController@getMypage');
Route::resource('/info','InfoController');


Route::post('upload/upload-photo','UploadController@uploadPhoto');
Route::resource('/upload','UploadController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
