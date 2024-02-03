<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;

class ElasticsearchPostRepository implements PostRepositoryInterface
{

    // /**
    //  * Retrieve all posts from Elasticsearch.
    //  *
    //  * @return array
    //  */
    public function getAllPosts()
    {
        $hosts = [
            'localhost:9200', // Example host and port
            // Add more hosts if needed
        ];
        $params = [
            'index' => 'posts_index',
            'body' => [
                'query' => [
                    'match_all' => (object) [],
                ],
            ],
        ];
        $client = ClientBuilder::create()
    ->setHosts($hosts)
    ->build();
        $response = $client->search($params);

        return $response;
    }
}