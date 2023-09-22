<?php

namespace App\Providers;


use App\Repositories\Eloquent\InterestRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\InterestRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(InterestRepositoryInterface::class, InterestRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
