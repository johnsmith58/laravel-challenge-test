<?php

namespace App\Repositories\PostMangement;

use App\Models\Post;

class PostRepository implements PostInterface
{
    public function list()
    {
        return Post::with('tags')->withCount('likes')->get();
    }
    
    public function toggleReaction()
    {
        //
    }
}