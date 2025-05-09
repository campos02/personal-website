<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function getPosts()
    {
        return Post::all();
    }

    public function getPostById(int $id)
    {
        return Post::find($id) ?? abort(404);
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|max:20',
            'title' => 'required|max:100',
            'content' => 'required',
        ]);

        return Post::updateOrCreatePost($validated);
    }

    public function deletePostById(int $id)
    {
        Post::destroy($id);
    }
}
