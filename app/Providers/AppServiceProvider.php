<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TournamentRepositoryInterface;
use App\Repositories\TournamentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TournamentRepositoryInterface::class, TournamentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
