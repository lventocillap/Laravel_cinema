<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\SaleStrategy\Handler;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Container\Container;
use Src\DetailSale\Infrastructure\SaleStrategy\Interface\StrategySaleInterface;

class SaleHandler
{
    private StrategySaleInterface $strategySaleInterface;

    public function porcessSale(Request $request): JsonResponse
    {
        return $this->strategySaleInterface->registerSale($request);
    }
    public function setStrategySalClass(string $class): void
    {
        $this->strategySaleInterface = Container::getInstance()->make($class);
    }
}
