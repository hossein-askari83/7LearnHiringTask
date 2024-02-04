<?php

namespace App\Providers;

use App\Console\Commands\ReindexPostsCommand;
use App\Interfaces\PostRepositoryInterface;
use App\Repositories\ElasticsearchPostRepository;
use App\Repositories\MySQLPostRepository;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\ClientInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, function () {
            if (request()->route()->getPrefix() ==="api/v2") {
                return new MySQLPostRepository();
            } elseif (request()->route()->getPrefix() ==="api/v1") {
                $client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();
                return new ElasticsearchPostRepository($client);
            }
        });
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
