<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistsApiController extends Controller
{
    public function addArtist(Request $request) : string
    {
        $artist = $request->input('artist');
        $category = $request->input('category');
        if (empty($artist) || empty($category)) {
            abort(400);
        }

        $artistResult = new Artist;
        $artistResult->artist = $artist;
        $artistResult->category = $category;
        $artistResult->save();

        $result = Artist::find($artistResult->id);
        return $result->toJson();
    }

    public function removeArtist(Request $request) : string
    {
        $artist = $request->input('artist');
        if (empty($artist)) {
            abort(400);
        }

        Artist::where($artist)->delete();
        return response()->json([
            'artist' => $artist,
            'result' => 'All entries removed'
        ]);
    }

    public function removeArtistById(string $id) : string
    {
        $artistResult = Artist::find($id);
        $artistName = $artistResult->artist;
        $artistResult->delete();
        return response()->json([
            'artist' => $artistName,
            'result' => 'Removed'
        ]);
    }
}
