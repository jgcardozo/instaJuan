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
    $users = \App\Models\User::all();
    return view('welcome', ['users'=>$users] );
});


Route::get('/profile/{id}', function($id){
    $user = \App\Models\User::find($id);

    $posts = $user->posts()
    ->with('category', 'image', 'tags')
    ->withCount('comments')->get();

    $videos = $user->videos()
    ->with('category', 'image', 'tags')
    ->withCount('comments')->get();

    return view('profile', compact('user','posts','videos') );
})->name('profile');



Route::get('/level/{id}', function($id){
    $level = \App\Models\Level::find($id);

    $posts = $level->posts()
    ->with('category', 'image', 'tags')
    ->withCount('comments')->get();

    $videos = $level->videos()
    ->with('category', 'image', 'tags')
    ->withCount('comments')->get();

    return view('level', compact('level','posts','videos') );
})->name('level');