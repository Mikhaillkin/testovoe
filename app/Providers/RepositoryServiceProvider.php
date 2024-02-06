<?php

namespace App\Providers;

use App\Contracts\Repositories\GradeRepositoryInterface;
use App\Repositories\GradeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
