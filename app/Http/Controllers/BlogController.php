<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function showPostList(): View
    {
        return view('blog', [
            'posts' => Post::all(),
        ]);
    }

    public function showPost(string $post): View
    {
        return view('blogpost', [
            'post' => Post::findByUrl($post) ?? abort(404),
        ]);
    }
}
