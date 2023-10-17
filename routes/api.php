<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminClubController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\PlayersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



    //Admin Routes
Route::post('admin-clubs',[AdminClubController::class,'create']);
Route::get('admin-clubs',[AdminClubController::class,'index']);
Route::put('admin-clubs/{id}',[AdminClubController::class,'update']);
Route::delete('admin-clubs/{id}',[AdminClubController::class,'delete']);

//Players Routes
Route::post('players',[PlayersController::class,'create']);
Route::put('players/{id}',[PlayersController::class,'update']);
Route::get('players',[PlayersController::class,'index']);
Route::delete('players/{id}',[PlayersController::class,'delete']);

//Matches Routes
Route::post('matches',[MatchesController::class,'create']);
Route::put('matches/{id}',[MatchesController::class,'update']);
Route::get('matches',[MatchesController::class,'index']);
Route::delete('matches/{id}',[MatchesController::class,'delete']);


