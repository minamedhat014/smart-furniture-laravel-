<?php

namespace App\Providers;

use App\interfaces\showrooms\distRepoInterface;
use App\Repos\Showrooms\distRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(distRepoInterface::class,distRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
