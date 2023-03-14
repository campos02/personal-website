<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ArtistsController extends Controller
{
    public function show() : View
    {
        $listeningArtists = DB::table('artists')->where('category', 'Listening')->get();
        $otherArtists = DB::table('artists')->where('category', 'Other')->get();
        $albumsQuery = DB::table('albums')->get();
        $albums = $albumsQuery->groupBy('artist');

        return view('favoriteartists', [
            'listeningArtists' => $listeningArtists,
            'otherArtists' => $otherArtists,
            'artistsAlbums' => $albums,
        ]);
    }
}
