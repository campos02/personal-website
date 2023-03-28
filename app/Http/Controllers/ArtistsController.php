<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Artist;
use App\Models\Album;

class ArtistsController extends Controller
{
    public function show() : View
    {
        $listeningArtists = Artist::where('category', 'Listening')->get();
        $otherArtists = Artist::where('category', 'Other')->get();
        $albumsQuery = Album::all();
        $albums = $albumsQuery->groupBy('artist');

        return view('favoriteartists', [
            'listeningArtists' => $listeningArtists,
            'otherArtists' => $otherArtists,
            'artistsAlbums' => $albums,
        ]);
    }
}
