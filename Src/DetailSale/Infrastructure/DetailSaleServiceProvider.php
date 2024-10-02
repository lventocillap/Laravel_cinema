<?php
declare(strict_types=1);

namespace Src\DetailSale\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Src\DetailSale\Domain\Interface\DetailSaleInterface;
use Src\DetailSale\Infrastructure\Persistence\DetailSaleEloquentPersistence;

class DetailSaleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DetailSaleInterface::class, DetailSaleEloquentPersistence::class);
    }
}