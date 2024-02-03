<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class MySQLPostRepository implements PostRepositoryInterface
{
    public function getAllPosts()
    {
        return Post::get();
    }
}