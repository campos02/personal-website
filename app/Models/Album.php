<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Album extends Model
{
    use HasFactory;

    public static function selectAlbum(string $id) : Album
    {
        if (!$album = Album::find($id)) {
            throw new ModelNotFoundException('Album not found');
        }

        return $album;
    }
}
