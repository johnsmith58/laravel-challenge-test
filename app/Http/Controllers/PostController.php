<?php

namespace App\Http\Controllers;

use App\Exceptions\PostNotFoundException;
use App\Exceptions\PostReactionException;
use App\Http\Requests\PostReactionRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostMangement\PostRepository;
use App\Services\PostManagement\PostService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use ApiResponser;

    /**
     * @var PostRepository
     * return PostResource
     */
    public function list(PostRepository $postRepository)
    {
        $posts = $postRepository->list();
        return $this->success(200, PostResource::collection($posts));
    }
    
    public function toggleReaction(PostReactionRequest $request, PostService $postService)
    {
        try
        {
            $post = $postService->toggleReaction($request->post_id, $request->like);
            if($post)
            {
                $message = $request->like ? 'You like this post successfully' : 'You unlike this post successfully';
                return $this->success(200, null, $message);
            }
        } catch (PostNotFoundException $exception)
        {
            // Post model not found
            return $this->error(404, $exception->getMessage());
        } catch (PostReactionException $exception)
        {
            // Post reaction exception
            return $this->error(500, $exception->getMessage());
        }
    }
}
