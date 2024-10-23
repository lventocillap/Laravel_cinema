<?php

declare(strict_types=1);

namespace Src\Profile\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Profile\Domain\Interface\ProfileInterface;
use Src\Profile\Infrastructure\Persistence\ProfileEloquentPersistence;

class ProfileServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ProfileInterface::class, ProfileEloquentPersistence::class);
    }
}
