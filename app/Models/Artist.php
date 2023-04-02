<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Album;

class Artist extends Model
{
    use HasFactory;

    public static function selectListeningArtists() : Collection
    {
        return Artist::where('category', 'Listening')->get();
    }

    public static function selectOtherArtists() : Collection
    {
        return Artist::where('category', 'Other')->get();
    }

    public static function selectArtist(string $id) : Artist
    {
        if (!$artist = Artist::find($id)) {
            throw new ModelNotFoundException('Artist not found');
        }

        return $artist;
    }

    public static function insertArtist(string $artist, string $category) : Artist
    {
        $newArtist = new Artist;
        $newArtist->artist = $artist;
        $newArtist->category = $category;
        $newArtist->save();
        
        return Artist::find($newArtist->id);
    }

    public static function deleteArtist(string $artist)
    {
        $artistToDelete = Artist::where('artist', $artist);

        if ($artistToDelete->get()->isEmpty()) {
            throw new ModelNotFoundException('Artist not found');
        } else {
            $artistToDelete->delete();
        }
    }

    public static function deleteArtistById(string $id) : string
    {
        $artist = Artist::selectArtist($id);
        $artistName = $artist->artist;
        $artist->delete();

        return $artistName;
    }

    public function albums() : HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function selectAlbum(string $id) : Album
    {
        if (!$album = $this->albums->find($id)) {
            throw new ModelNotFoundException('Album not found');
        }

        return $album;
    }

    public function insertAlbum(string $album) : Album
    {
        $albumToAdd = new Album;
        $albumToAdd->artist = $this->artist;
        $albumToAdd->album = $album;
        $this->albums()->save($albumToAdd);

        return Album::find($albumToAdd->id);
    }

    public function deleteAlbum(string $album) 
    {
        $albumToDelete = Album::where('album', $album);

        if ($albumToDelete->get()->isEmpty()) {
            throw new ModelNotFoundException('Album not found');
        } else {
            $albumToDelete->delete();
        }
    }

    public function deleteAlbumById(string $id) : string
    {
        $album = Album::selectAlbum($id);
        $albumName = $album->album;
        $album->delete();

        return $albumName;
    }
}
