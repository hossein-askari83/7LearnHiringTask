<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Elastic\Elasticsearch\Client;

class ElasticsearchPostRepository implements PostRepositoryInterface
{
    protected $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Retrieve all posts from Elasticsearch.
     *
     * @return array
     */
    public function getAllPosts()
    {
        $params = [
            'index' => 'posts_index',
            'body' => [
                'query' => [
                    'match_all' => (object) [],
                ],
            ],
        ];

        $response = $this->elasticsearch->search($params);

        return $response;
    }
}