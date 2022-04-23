<?php

namespace App\Services\PostManagement;

use App\Models\Like;
use App\Models\Post;
use App\Exceptions\PostNotFoundException;
use App\Exceptions\PostReactionException;
use App\Services\PostManagement\PostReaction;

class PostService implements PostReaction
{
    public function toggleReaction(int $post_id, bool $like)
    {
        $post = Post::findOrFail($post_id);
        if (!$post)
        {
            throw new PostNotFoundException('Model Not found');
        }

        // user like his own post
        if ($post->author_id == auth()->id())
        {
            throw new PostReactionException('You cannot like your post');
        }

        // check user already liked the post
        $userLike = $post->likes()->where('user_id', auth()->id())->where('post_id', $post_id)->first();
        if (!is_null($userLike) && $like)
        {
            throw new PostReactionException('You already liked this post');
        } else if (!is_null($userLike) && !$like) {
            // user unlike post
            $userLike->delete();
            return true;
        }

        // user like new post
        Like::create([
            'post_id' => $post_id,
            'user_id' => auth()->id()
        ]);

        return true;
    }
}