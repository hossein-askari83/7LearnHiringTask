<?php

namespace App\Providers;

use App\Interfaces\PostRepositoryInterface;
use App\Repositories\ElasticsearchPostRepository;
use App\Repositories\MySQLPostRepository;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->singleton(Client::class, function ($app) {
        //     $hosts = [
        //         [
        //             'host' => 'localhost',
        //             'port' => 9200,
        //             'scheme' => 'http',
        //         ],
        //         // Add more hosts if needed
        //     ];
        //     return ClientBuilder::create()->setHosts($hosts)->build();
        // });

        // Bind the PostRepositoryInterface to the appropriate implementation
        $this->app->bind(PostRepositoryInterface::class, function ($app) {
            // Determine which implementation to use based on configuration, request, etc.
            // For example, if the request is for v1, use MySQL repository; if it's v2, use Elasticsearch repository.
            // You may need to implement your own logic here based on your application's requirements.
            if (request()->route()->getPrefix() ==="api/v2") {
                return new MySQLPostRepository();
            } elseif (request()->route()->getPrefix() ==="api/v1") {
                return new ElasticsearchPostRepository();
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
