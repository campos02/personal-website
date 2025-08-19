<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AlbumsApiController extends Controller
{
    /**
     * Gets all albums
     */
    public function getAlbums(): AnonymousResourceCollection
    {
        return AlbumResource::collection(Album::all());
    }

    /**
     * Gets an artist using its ID
     */
    public function getAlbumById(string $id): AlbumResource
    {
        $album = Album::selectAlbum($id);

        return new AlbumResource($album);
    }

    /**
     * Gets all albums by an artist
     */
    public function getArtistAlbums(string $artistId): AnonymousResourceCollection
    {
        $artist = Artist::selectArtistById($artistId);

        return AlbumResource::collection($artist->albums);
    }

    /**
     * Gets an album by an artist
     */
    public function getArtistAlbumById(string $artistId, string $albumId): AlbumResource
    {
        $album = Artist::selectArtistById($artistId)->selectAlbum($albumId);

        return new AlbumResource($album);
    }

    /**
     * Adds a new album to an artist's records
     */
    public function addAlbum(Request $request, string $artistId): string
    {
        $request->validate([
            'album' => 'required',
        ]);

        $album = $request->input('album');
        $artist = Artist::selectArtistById($artistId);

        return $artist->insertAlbum($album)->toJson();
    }

    /**
     * Removes an album from an artist's records
     */
    public function removeAlbum(Request $request, string $artistId): string
    {
        $request->validate([
            'album' => 'required',
        ]);

        $album = $request->input('album');
        Artist::selectArtistById($artistId)->deleteAlbum($album);

        return response()->json([
            'result' => "$album removed",
        ]);
    }

    /**
     * Removes an album, using its ID, from an artists records
     */
    public function removeAlbumById(string $artistId, string $albumId): string
    {
        $album = Artist::selectArtistById($artistId)->deleteAlbumById($albumId);

        return response()->json([
            'result' => "$album removed",
        ]);
    }
}
