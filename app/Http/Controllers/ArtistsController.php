<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Artist;
use App\Models\Album;

class ArtistsController extends Controller
{
    /**
     * Gets each category's data and shows favorite artists page
     *
     * @return View
     */
    public function show() : View
    {
        $listeningArtists = Artist::selectListeningArtists();
        $otherArtists = Artist::selectOtherArtists();

        return view('favoriteartists', [
            'listeningArtists' => $listeningArtists,
            'otherArtists' => $otherArtists,
        ]);
    }
}
