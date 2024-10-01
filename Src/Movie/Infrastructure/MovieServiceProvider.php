<?php
declare(strict_types=1);

namespace Src\Movie\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Movie\Domain\Interface\MovieInterface;
use Src\Movie\Infrastructure\Persistence\MovieEloquentPersistence;

class MovieServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MovieInterface::class,MovieEloquentPersistence::class);
    }
}