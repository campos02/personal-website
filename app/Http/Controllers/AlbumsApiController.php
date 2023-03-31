<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Resources\AlbumCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AlbumsApiController extends Controller
{
    public function getAlbums() : AnonymousResourceCollection
    {
        return AlbumCollection::collection(Album::all());
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
            abort(404);
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
            abort(404);
        }

        $albumName = $albumResult->album;
        $albumResult->delete();

        return response()->json([
            'result' => "$albumName removed"
        ]);
    }
}
