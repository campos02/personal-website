<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::view('/projects', 'projects');

Route::get('/listening', [ArtistsController::class, 'show']);

Route::get('/about', [AboutController::class, 'show']);

Route::prefix('/blog')->group(function () {
    Route::get('/', [BlogController::class, 'showPostList']);
    Route::get('/{post}', [BlogController::class, 'showPost']);
});
