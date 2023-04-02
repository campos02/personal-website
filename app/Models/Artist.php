<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Album;

class Artist extends Model
{
    use HasFactory;

    public function insertArtist(string $artist, string $category) : Artist
    {
        $this->artist = $artist;
        $this->category = $category;
        $this->save();
        
        return Artist::find($this->id);
    }

    public function albums() : HasMany
    {
        return $this->hasMany(Album::class);
    }
}
