<?php

use App\Http\Controllers\AlbumsApiController;
use App\Http\Controllers\ArtistsApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/artists')->group(function () {
    Route::get('/', [ArtistsApiController::class, 'getArtists']);
    Route::get('/listening', [ArtistsApiController::class, 'getListeningArtists']);
    Route::get('/other', [ArtistsApiController::class, 'getOtherArtists']);
    Route::get('/{id}', [ArtistsApiController::class, 'getArtistById']);
    Route::get('/{artistId}/albums', [AlbumsApiController::class, 'getArtistAlbums']);
    Route::get('/{artistId}/albums/{albumId}', [AlbumsApiController::class, 'getArtistAlbumById']);
    Route::get('/id', [ArtistsApiController::class, 'getArtistId']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [ArtistsApiController::class, 'addArtists']);
        Route::delete('/', [ArtistsApiController::class, 'removeArtist']);
        Route::delete('/{id}', [ArtistsApiController::class, 'removeArtistById']);
        Route::post('/{artistId}/albums', [AlbumsApiController::class, 'addAlbum']);
        Route::delete('/{artistId}/albums', [AlbumsApiController::class, 'removeAlbum']);
        Route::delete('/{artistId}/albums/{albumId}', [AlbumsApiController::class, 'removeAlbumById']);
    });
});

Route::prefix('/albums')->group(function () {
    Route::get('/', [AlbumsApiController::class, 'getAlbums']);
    Route::get('/{id}', [AlbumsApiController::class, 'getAlbumById']);
});

Route::prefix('/posts')->group(function () {
    Route::get('/', [PostController::class, 'getPosts']);
    Route::get('/{id}', [PostController::class, 'getPostById']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('/', [PostController::class, 'createPost']);
        Route::delete('/{id}', [PostController::class, 'deletePostById']);
    });
});
