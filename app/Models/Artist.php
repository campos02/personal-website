<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
    ];

    /**
     * Returns all artists in the Listening category
     */
    public static function selectListeningArtists(): Collection
    {
        return Artist::where('category', 'Listening')->get();
    }

    /**
     * Returns all artists in the Other category
     */
    public static function selectOtherArtists(): Collection
    {
        return Artist::where('category', 'Other')->get();
    }

    /**
     * Returns, if found, an artist using its name
     */
    public static function selectArtist(string $artistName): Artist
    {
        return Artist::where('name', $artistName)->firstOrFail();
    }

    /**
     * Returns, if found, an artist using its ID
     */
    public static function selectArtistById(string $id): Artist
    {
        return Artist::findOrFail($id);
    }

    /**
     * Inserts an artist on the database and returns the new record
     */
    public static function insertArtist(string $artist, string $category): Artist
    {
        $newArtist = new Artist;
        $newArtist->name = $artist;
        $newArtist->category = $category;
        $newArtist->save();

        return Artist::find($newArtist->id);
    }

    /**
     * Deletes an artist from the database, all records with the same name are deleted
     */
    public static function deleteArtist(string $artist)
    {
        $artistToDelete = Artist::where('name', $artist);

        if ($artistToDelete->get()->isEmpty()) {
            throw new ModelNotFoundException('Artist not found');
        } else {
            $artistToDelete->delete();
        }
    }

    /**
     * Deletes, if found, an artist from the database using its ID and returns its name
     */
    public static function deleteArtistById(string $id): string
    {
        $artist = Artist::selectArtistByID($id);
        $artistName = $artist->name;
        $artist->delete();

        return $artistName;
    }

    /**
     * Returns all albums associated with the artist
     */
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    /**
     * Returns, if found, an album using its ID
     */
    public function selectAlbum(string $id): Album
    {
        return $this->albums->findOrFail($id);
    }

    /**
     * Adds an album to the database, associating it with the artist and returning the new record
     */
    public function insertAlbum(string $album): Album
    {
        $albumToAdd = new Album;
        $albumToAdd->artist_name = $this->name;
        $albumToAdd->album = $album;
        $this->albums()->save($albumToAdd);

        return Album::find($albumToAdd->id);
    }

    /**
     * Deletes, if found, and album using its name
     */
    public function deleteAlbum(string $album)
    {
        $albumToDelete = Album::where('album', $album);

        if ($albumToDelete->get()->isEmpty()) {
            throw new ModelNotFoundException('Album not found');
        } else {
            $albumToDelete->delete();
        }
    }

    /**
     * Deletes, if found, an album using its ID and returns its name
     */
    public function deleteAlbumById(string $id): string
    {
        $album = Album::selectAlbum($id);
        $albumName = $album->album;
        $album->delete();

        return $albumName;
    }
}
