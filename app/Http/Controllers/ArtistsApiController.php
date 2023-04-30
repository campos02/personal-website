<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Http\Resources\ArtistResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArtistsApiController extends Controller
{
    /**
     * Gets all artists
     *
     * @return AnonymousResourceCollection
     */
    public function getArtists() : AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::all());
    }

    /**
     * Gets all artists in the Listening category
     *
     * @return AnonymousResourceCollection
     */
    public function getListeningArtists() : AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::selectListeningArtists());
    }

    /**
     * Gets all artists in the Other category
     *
     * @return AnonymousResourceCollection
     */
    public function getOtherArtists() : AnonymousResourceCollection
    {
        return ArtistResource::collection(Artist::selectOtherArtists());
    }

    /**
     * Gets an artist using its ID
     *
     * @param string $id
     * @return ArtistResource
     */
    public function getArtistById(string $id) : ArtistResource
    {
        $artist = Artist::selectArtistById($id);

        return new ArtistResource($artist);
    }

    /**
     * Gets an artist's ID using its name
     *
     * @param Request $request
     * @return ArtistResource
     */
    public function getArtistId(Request $request) : ArtistResource
    {
        $request->validate([
            'name' => 'required',
        ]);

        $artist = $request->input('name');

        return new ArtistResource(Artist::selectArtist($artist)); 
    }

    /**
     * Adds a new artist
     *
     * @param Request $request
     * @return string
     */
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

    /**
     * Removes an artist and its albums
     *
     * @param Request $request
     * @return string
     */
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

    /**
     * Removed an artist and its albums using its ID
     *
     * @param string $id
     * @return string
     */
    public function removeArtistById(string $id) : string
    {
        $artistName = Artist::deleteArtistById($id);

        return response()->json([
            'result' => "$artistName removed"
        ]);
    }
}
