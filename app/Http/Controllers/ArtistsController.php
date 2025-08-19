<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\View\View;

class ArtistsController extends Controller
{
    /**
     * Gets each category's data and shows favorite artists page
     */
    public function show(): View
    {
        $listeningArtists = Artist::selectListeningArtists();
        $otherArtists = Artist::selectOtherArtists();

        return view('listening', [
            'listeningArtists' => $listeningArtists,
            'otherArtists' => $otherArtists,
        ]);
    }
}
