<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\DemandeRepositoryInterface;
use App\Contracts\AffectationRepositoryInterface;
use App\Contracts\EnseignantRepositoryInterface;
use App\Contracts\EcoleRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\ProvedRepositoryInterface;
use App\Contracts\SousProvedRepositoryInterface;
use App\Contracts\RoleRepositoryInterface;

use App\Repositories\DemandeRepository;
use App\Repositories\AffectationRepository;
use App\Repositories\EnseignantRepository;
use App\Repositories\EcoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\ProvedRepository;
use App\Repositories\SousProvedRepository;
use App\Repositories\RoleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Lié les interfaces aux repositories
        $this->app->bind(DemandeRepositoryInterface::class, DemandeRepository::class);
        $this->app->bind(AffectationRepositoryInterface::class, AffectationRepository::class);
        $this->app->bind(EnseignantRepositoryInterface::class, EnseignantRepository::class);
        $this->app->bind(EcoleRepositoryInterface::class, EcoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProvedRepositoryInterface::class, ProvedRepository::class);
        $this->app->bind(SousProvedRepositoryInterface::class, SousProvedRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
