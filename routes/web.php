<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use App\User;

Auth::routes();

Route::get('/home', function (){
    $posts = \App\Blog::orderby('id', 'desc')->get();
    return view('home')->with('posts', $posts);
});

Route::get('/', function (){
    $posts = \App\Blog::orderby('id', 'desc')->get();
    return view('home')->with('posts', $posts);
});

//-------------- ERRORS


Route::get('noperm', function (){
    return view('errors.perm');
});


//-------------- POSTS


Route::get('post/{id}', 'cpController@showPost');
Route::post('post/{id}', 'cpController@postComment');

Route::get('cp', 'cpController@showCp')->middleware('auth')->middleware('admin');

Route::get('new', 'cpController@showNew')->middleware('auth')->middleware('mod');
Route::post('new', 'cpController@newPost')->middleware('auth')->middleware('mod');


Route::any('editpost/{id}', 'cpController@editPost')->middleware('admin');





Route::get('logout', function (){
    Auth::logout();
    return \Illuminate\Support\Facades\Redirect::to('home');

});


Route::get('/profile', function (){
    $user = \Illuminate\Support\Facades\Auth::user();
    $posts = \App\Blog::getPostsForUser($user->id);


    return view('profile')->with('user', $user)->with('posts', $posts);
});

Route::get('/profile/{id}', function ($id){
    $user = User::getUserById($id);
    $posts = \App\Blog::getPostsForUser($user->id);

    return view('profile')->with('user', $user)->with('posts', $posts);
});


//TESTS

Route::get('error', function (){
    return abort(503);
});



