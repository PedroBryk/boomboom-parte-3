<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProfessorServiceInterface;
use App\Services\Professor\ProfessorService;
use App\Services\Professor\ProfessorValidator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Vincula a interface à implementação concreta
        $this->app->bind(ProfessorServiceInterface::class, function ($app) {
            return new ProfessorService(new ProfessorValidator());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
