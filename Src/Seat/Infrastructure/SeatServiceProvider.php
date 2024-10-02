<?php
declare(strict_types=1);

namespace Src\Seat\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Seat\Domain\Interface\SeatInterface;
use Src\Seat\Infrastructure\Persistence\SeatEloquentPersistence;

class SeatServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SeatInterface::class, SeatEloquentPersistence::class);
    }
}