<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsApiController extends Controller
{
    public function addAlbum(Request $request) : string
    {
        $artist = $request->input('artist');
        $album = $request->input('album');
        if (empty($artist) || empty($album)) {
            abort(400);
        }

        $albumResult = new Album;
        $albumResult->artist = $artist;
        $albumResult->album = $album;
        $albumResult->save();

        $result = Album::find($albumResult->id);
        return $result->toJson();
    }

    public function removeAlbum(Request $request) : string
    {
        $album = $request->input('album');
        if (empty($album)) {
            abort(400);
        }

        Album::where($album)->delete();
        return response()->json([
            'album' => $album,
            'result' => 'All entries removed'
        ]);
    }

    public function removeAlbumById(string $id) : string
    {
        $albumResult = Album::find($id);
        $albumName = $albumResult->album;
        $albumResult->delete();
        
        return response()->json([
            'album' => $albumName,
            'result' => 'Removed'
        ]);
    }
}
