<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Artist;
use App\Models\Album;

class ArtistsController extends Controller
{
    public function show() : View
    {
        $listeningArtists = Artist::where('category', 'Listening')->get();
        $otherArtists = Artist::where('category', 'Other')->get();

        return view('favoriteartists', [
            'listeningArtists' => $listeningArtists,
            'otherArtists' => $otherArtists,
        ]);
    }
}
