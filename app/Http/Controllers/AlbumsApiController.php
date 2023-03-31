<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Resources\AlbumResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AlbumsApiController extends Controller
{
    public function getAlbums() : AnonymousResourceCollection
    {
        return AlbumResource::collection(Album::all());
    }

    public function getAlbumById(string $id)
    {
        if (!$album = Album::find($id)) {
            return response()->json([
                'message' => 'Album not found'
            ], 404);
        }

        return new AlbumResource($album);
    }

    public function addAlbum(Request $request) : string
    {
        $request->validate([
            'artist' => 'required',
            'album' => 'required'
        ]);
        
        $artist = $request->input('artist');
        $album = $request->input('album');

        $albumResult = new Album;
        $albumResult->artist = $artist;
        $albumResult->album = $album;
        $albumResult->save();
        $result = Album::find($albumResult->id);

        return $result->toJson();
    }

    public function removeAlbum(Request $request) : string
    {
        $request->validate([
            'album' => 'required',
        ]);

        $album = $request->input('album');
        $results = Album::where('album', $album);
        if ($results->get()->isEmpty()) {
            return response()->json([
                'message' => 'Album not found'
            ], 404);
        } else {
            $results->delete();
        }

        return response()->json([
            'result' => "$album removed"
        ]);
    }

    public function removeAlbumById(string $id) : string
    {
        if (!$albumResult = Album::find($id)) {
            return response()->json([
                'message' => 'Album not found'
            ], 404);
        }

        $albumName = $albumResult->album;
        $albumResult->delete();

        return response()->json([
            'result' => "$albumName removed"
        ]);
    }
}
