<?php
namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Log;

class ElasticsearchPostRepository implements PostRepositoryInterface
{

    protected $elasticsearch;

    private const ELASTICSEARCH_INDEX_NAME ="posts_index" ;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
    /**
    * Retrieve all posts from Elasticsearch.
    *
    * @return array
    */
    public function getAllPosts():array
    {
        $response = $this->elasticsearch->search()->asArray();
        return $response;
    }

    /**
    * Index all posts from Elasticsearch
    *
    * @return void
    */
    public function indexPosts():void
    {   
        if(!$this->elasticsearch->indices()->exists(['index' => $this::ELASTICSEARCH_INDEX_NAME]))
            $this->elasticsearch->indices()->create([
                'index' => $this::ELASTICSEARCH_INDEX_NAME,

            ]);
        $posts = Post::all();
        $params = ['body' => []];
        foreach ($posts as $post) {
            $params['body'][] = [
                'index' => [
                    '_index' => $this::ELASTICSEARCH_INDEX_NAME,
                    '_id' => $post->id,
                ]
            ];

            $params['body'][] = [
                'title' => $post->title,
            ];
        }
        $this->elasticsearch->bulk($params);
    }
}