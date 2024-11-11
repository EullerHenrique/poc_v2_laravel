<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FormacaoRepository;
use App\Repositories\Impl\EloquentFormacaoRepositoryImpl;

class FormacaoRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FormacaoRepository::class, EloquentFormacaoRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
