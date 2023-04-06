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

    public function getListeningArtists() : AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::selectListeningArtists());
    }

    public function getOtherArtists() : AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::selectOtherArtists());
    }

    public function getArtistById(string $id) : ArtistResource
    {
        $artist = Artist::selectArtistById($id);

        return new ArtistResource($artist);
    }

    public function getArtistId(Request $request) : ArtistResource
    {
        $request->validate([
            'name' => 'required',
        ]);

        $artist = $request->input('name');

        return new ArtistResource(Artist::selectArtist($artist)); 
    }

    public function addArtist(Request $request) : string
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'albums' => 'array'
        ]);
        
        $artist = $request->input('name');
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
            'name' => 'required',
        ]);

        $artist = $request->input('name');
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
