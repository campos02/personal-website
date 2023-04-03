<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;
use App\Http\Resources\AlbumResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AlbumsApiController extends Controller
{
    public function getAlbums() : AnonymousResourceCollection
    {
        return AlbumResource::collection(Album::all());
    }

    public function getAlbumById(string $id) : AlbumResource
    {
        $album = Album::selectAlbum($id);

        return new AlbumResource($album);
    }

    public function getArtistAlbums(string $artistId) : AnonymousResourceCollection
    {
        $artist = Artist::selectArtistById($artistId);

        return AlbumResource::collection($artist->albums);
    }

    public function getArtistAlbumById(string $artistId, string $albumId) : AlbumResource
    {
        $album = Artist::selectArtistById($artistId)->selectAlbum($albumId);

        return new AlbumResource($album);
    }

    public function addAlbum(Request $request, string $artistId) : string
    {
        $request->validate([
            'album' => 'required'
        ]);
        
        $album = $request->input('album');
        $artist = Artist::selectArtistById($artistId);

        return $artist->insertAlbum($album)->toJson();
    }

    public function removeAlbum(Request $request, string $artistId) : string
    {
        $request->validate([
            'album' => 'required',
        ]);

        $album = $request->input('album');
        Artist::selectArtistById($artistId)->deleteAlbum($album);

        return response()->json([
            'result' => "$album removed"
        ]);
    }

    public function removeAlbumById(string $artistId, string $albumId) : string
    {
        $album = Artist::selectArtistById($artistId)->deleteAlbumById($albumId);

        return response()->json([
            'result' => "$album removed"
        ]);
    }
}
