<?php

namespace App\Repositories\PostMangement;

use App\Models\Post;

/**
 * Class PostRepository
 * @package App\Repositories\PostMangement
 */

interface PostInterface
{
    public function list();
    
    public function toggleReaction();
}