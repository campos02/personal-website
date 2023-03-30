<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistsApiController extends Controller
{
    public function addArtist(Request $request) : string
    {
        $request->validate([
            'artist' => 'required',
            'category' => 'required'
        ]);
        
        $artist = $request->input('artist');
        $category = $request->input('category');

        $artistResult = new Artist;
        $artistResult->artist = $artist;
        $artistResult->category = $category;
        $artistResult->save();
        $result = Artist::find($artistResult->id);

        return $result->toJson();
    }

    public function removeArtist(Request $request) : string
    {
        $request->validate([
            'artist' => 'required',
        ]);

        $artist = $request->input('artist');
        $results = Artist::where('artist', $artist);
        if ($results->get()->isEmpty()) {
            abort(404);
        } else {
            $results->delete();
        }

        return response()->json([
            'result' => "$artist removed"
        ]);
    }

    public function removeArtistById(string $id) : string
    {
        if (!$artistResult = Artist::find($id)) {
            abort(404);
        }

        $artistName = $artistResult->artist;
        $artistResult->delete();

        return response()->json([
            'result' => "$artistName removed"
        ]);
    }
}
