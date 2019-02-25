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

Route::get('/', 'ContrTweets@readall')->middleware('auth');

Route::get('/home', 'ContrTweets@readall')->name('home')->middleware('auth');

// ==============================================

Route::get('/register', function(){
    echo 'Get Register';
});

Route::post('/register', 'ContrUsers@create');

// ==============================================

Route::get('/login', function(){
    // echo 'Get Login';
    return view('login');
})->name('login');

Route::post('/login', 'ContrAuth@authenticate');

Route::get('/logout', 'ContrAuth@logout');

// ==============================================

Route::get('/profile/{id}', 'ContrUsers@read');

Route::put('/profile', 'ContrUsers@update');
Route::post('/update_image', 'ContrUsers@updateImage');


Route::get('/change_password', function(){
    return view('change_password');
});

Route::put('/change_password', 'ContrUsers@updatePassword');

// ==============================================


Route::post('/tweet', 'ContrTweets@create');


