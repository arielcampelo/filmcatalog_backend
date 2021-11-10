<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;

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


// register user
Route::post('register', [AuthController::class, 'register']);

// login
Route::post('login', [AuthController::class, 'login']);


// middleware
Route::middleware('auth:sanctum')->group(function(){

    // get auth user
    Route::get('user', [AuthController::class, 'user']);

    // logout
    Route::post('logout', [AuthController::class, 'logout']);

    // List films
    Route::get('films', [FilmController::class, 'index']);

    // List all films with actors
    Route::get('filmswithcast', [FilmController::class, 'showall']);

    // List single film
    Route::get('film/{id}', [FilmController::class, 'show']);

    // Create new film
    Route::post('film', [FilmController::class, 'store']);

    // Update film
    Route::put('film/{id}', [FilmController::class, 'update']);

    // Delete film
    Route::delete('film/{id}', [FilmController::class,'destroy']);

    /* --------------------------------------------------------*/
    // List actors
    Route::get('actors', [ActorController::class, 'index']);

    // List single actor
    Route::get('actor/{id}', [ActorController::class, 'show']);

    // List actors by film_id
    Route::get('filmactors/{id}', [ActorController::class, 'showactors']);

    // Create new actor
    Route::post('actor', [ActorController::class, 'store']);

    // Update actor
    Route::put('actor/{id}', [ActorController::class, 'update']);

    // Delete actor
    Route::delete('actor/{id}', [ActorController::class,'destroy']);

    });




