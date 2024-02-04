<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

     /**
     * Retrieve all posts from given repository.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository->getAllPosts();
        return response()->json(['data' => $posts], Response::HTTP_OK);
    }
}
