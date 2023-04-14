<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'show']);

Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::view('/projects', 'projects');

Route::get('/favoriteartists', [ArtistsController::class, 'show']);