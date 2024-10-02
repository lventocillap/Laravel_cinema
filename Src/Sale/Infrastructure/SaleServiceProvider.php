<?php
declare(strict_types=1);

namespace Src\Sale\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\Sale\Domain\Interface\SaleInterface;
use Src\Sale\Infrastructure\Persistence\SaleEloquentPersistence;

class SaleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SaleInterface::class,SaleEloquentPersistence::class);
    }
}