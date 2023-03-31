<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistsApiController;
use App\Http\Controllers\AlbumsApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/artists', [ArtistsApiController::class, 'getArtists']);

Route::post('/artists', [ArtistsApiController::class, 'addArtist']);

Route::delete('/artists', [ArtistsApiController::class, 'removeArtist']);

Route::delete('/artists/{id}', [ArtistsApiController::class, 'removeArtistById']);

Route::get('/albums', [AlbumsApiController::class, 'getAlbums']);

Route::post('/albums', [AlbumsApiController::class, 'addAlbum']);

Route::delete('/albums', [AlbumsApiController::class, 'removeAlbum']);

Route::delete('/albums/{id}', [AlbumsApiController::class, 'removeAlbumById']);