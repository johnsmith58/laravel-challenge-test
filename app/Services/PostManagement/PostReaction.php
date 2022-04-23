<?php

namespace App\Services\PostManagement;

/**
 * Class PostReaction
 * @package App\Services\PostManagement
 */
interface PostReaction
{
    public function toggleReaction(int $post_id, bool $like);
}