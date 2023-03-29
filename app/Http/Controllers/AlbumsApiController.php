<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsApiController extends Controller
{
    public function addAlbum(Request $request)
    {
        $album = new Album;
        $album->album = $request->input('album');
        $album->artist = $request->input('artist');
        $album->save();

        $result = Album::find($album->id);
        return $result->toJson();
    }
}
