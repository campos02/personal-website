<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Http\Resources\ArtistResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArtistsApiController extends Controller
{
    public function getArtists() : AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::all());
    }

    public function getArtistById(string $id) : ArtistResource
    {
        $artist = Artist::selectArtistById($id);

        return new ArtistResource($artist);
    }

    public function getArtistId(Request $request) : ArtistResource
    {
        $request->validate([
            'artist' => 'required',
        ]);

        $artist = $request->input('artist');

        return new ArtistResource(Artist::selectArtist($artist)); 
    }

    public function addArtist(Request $request) : string
    {
        $request->validate([
            'artist' => 'required',
            'category' => 'required',
            'albums' => 'array'
        ]);
        
        $artist = $request->input('artist');
        $category = $request->input('category');
        $result = Artist::insertArtist($artist, $category);

        if ($albums = $request->input('albums')) {
            foreach ($albums as $album) {
                $result->insertAlbum($album);
            }
        }

        return $result->toJson();
    }

    public function removeArtist(Request $request) : string
    {
        $request->validate([
            'artist' => 'required',
        ]);

        $artist = $request->input('artist');
        Artist::deleteArtist($artist);

        return response()->json([
            'result' => "$artist removed"
        ]);
    }

    public function removeArtistById(string $id) : string
    {
        $artistName = Artist::deleteArtistById($id);

        return response()->json([
            'result' => "$artistName removed"
        ]);
    }
}
