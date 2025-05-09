<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'url',
        'title',
        'content'
    ];
    
    public static function updateOrCreatePost($data): Post
    {
        return Post::updateOrCreate(
            ['url' => $data['url']],
            [
                'title' => $data['title'],
                'content' => $data['content']
            ]
        );
    }

    public static function findByUrl($url): ?Post
    {
        return Post::where('url', $url)->first();
    }
}
