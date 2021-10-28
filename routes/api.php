<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;

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

// List films
Route::get('films', [FilmController::class, 'index']);

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

// List single film
Route::get('actor/{id}', [ActorController::class, 'show']);

// Create new film
Route::post('actor', [ActorController::class, 'store']);

// Update film
Route::put('actor/{id}', [ActorController::class, 'update']);

// Delete film
Route::delete('actor/{id}', [ActorController::class,'destroy']);
