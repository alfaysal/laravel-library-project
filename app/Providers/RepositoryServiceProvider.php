<?php

namespace App\Providers;

use App\Http\Interfaces\DepartmentRepositoryInterface;
use App\Http\Interfaces\EloquentRepositoryInterface;
use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\DepartmentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
