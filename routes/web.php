<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return view('admin.app');
});

Route::get('admins-list',function(){
    return view('admin.club-admins.index');
});

Route::get('new-admin',function(){
    return view('admin.club-admins.create');
});

Route::get('players-list',function(){
    return view('admin.players.index');
});

Route::get('new-player',function(){
    return view('admin.players.create');
});

Route::get('matches-list',function(){
    return view('admin.matches.index');
});

Route::get('new-match',function(){
    return view('admin.matches.create');
});

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
