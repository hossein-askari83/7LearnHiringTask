<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class MySQLPostRepository implements PostRepositoryInterface
{

     /**
     * Retrieve all posts from MySQL.
     *
     * @return Collection
     */
    public function getAllPosts():array
    {
        return Post::all()->toArray();
    }
}