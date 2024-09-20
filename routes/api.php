<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\BandController;

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

/*
Route::get('hello/{name}', function($name){
    return "hello " . $name;
});

Route::get('hello-post/{name}', [HelloWorldController::class, 'hello']);
*/

Route::get('bands', [BandController::class, 'getAll']);
Route::post('bands/store', [BandController::class, 'store']);
Route::get('bands/genre/{genre}', [BandController::class, 'getBandsByGenre']);
Route::get('bands/{id}', [BandController::class, 'getById']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
