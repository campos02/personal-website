<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistsApiController extends Controller
{
    public function addArtist(Request $request)
    {
        $artist = new Artist;
        $artist->artist = $request->input('artist');
        $artist->category = $request->input('category');
        $artist->save();

        $result = Artist::find($artist->id);
        return $result->toJson();
    }
}
