<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\ArtistCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArtistsApiController extends Controller
{
    /**
     * Gets all artists
     *
     * @return ArtistCollection
     */
    public function getArtists() : ArtistCollection
    {
        return new ArtistCollection(Artist::all());
    }

    /**
     * Gets all artists in the Listening category
     *
     * @return ArtistCollection
     */
    public function getListeningArtists() : ArtistCollection
    {
        return new ArtistCollection(Artist::selectListeningArtists());
    }

    /**
     * Gets all artists in the Other category
     *
     * @return ArtistCollection
     */
    public function getOtherArtists() : ArtistCollection
    {
        return new ArtistCollection(Artist::selectOtherArtists());
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
    public function addArtists(Request $request) : string
    {
        $request->validate([
            'artists.*.name' => 'required',
            'artists.*.category' => 'required',
            'artists.*.albums' => 'array'
        ]);

        $artists = $request->input('artists.*');
        foreach ($artists as $artist) {
            $result = Artist::insertArtist($artist['name'], $artist['category']);

            if (isset($artist['albums'])) {
                foreach ($artist['albums'] as $album) {
                    $result->insertAlbum($album['album']);
                }
            }
        }

        return response()->json($artists);
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
