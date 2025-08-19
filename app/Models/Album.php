<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_name',
        'album',
    ];

    /**
     * Finds and returns, if found, an album using its ID
     */
    public static function selectAlbum(string $id): Album
    {
        return Album::findOrFail($id);
    }
}
