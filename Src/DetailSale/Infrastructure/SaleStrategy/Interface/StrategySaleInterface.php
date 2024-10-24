<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\SaleStrategy\Interface;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface StrategySaleInterface
{
    public function registerSale(Request $request):JsonResponse;
}