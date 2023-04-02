<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistsApiController;
use App\Http\Controllers\AlbumsApiController;
use App\Http\Controllers\AuthController;

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

Route::post('/token', [AuthController::class, 'createToken']);

Route::get('/artists', [ArtistsApiController::class, 'getArtists']);

Route::get('/artists/{id}', [ArtistsApiController::class, 'getArtistById']);

Route::get('/artists/{artistId}/albums', [AlbumsApiController::class, 'getArtistAlbums']);

Route::get('/artists/{artistId}/albums/{albumId}', [AlbumsApiController::class, 'getArtistAlbumById']);

Route::middleware('auth:sanctum')->post('/artists', [ArtistsApiController::class, 'addArtist']);

Route::middleware('auth:sanctum')->delete('/artists', [ArtistsApiController::class, 'removeArtist']);

Route::middleware('auth:sanctum')->delete('/artists/{id}', [ArtistsApiController::class, 'removeArtistById']);

Route::middleware('auth:sanctum')->post('/artists/{artistId}/albums', [AlbumsApiController::class, 'addAlbum']);

Route::middleware('auth:sanctum')->delete('/artists/{artistId}/albums', [AlbumsApiController::class, 'removeAlbum']);

Route::middleware('auth:sanctum')->delete('/artists/{artistId}/albums/{albumId}', [AlbumsApiController::class, 'removeAlbumById']);

Route::get('/albums', [AlbumsApiController::class, 'getAlbums']);

Route::get('/albums/{id}', [AlbumsApiController::class, 'getAlbumById']);