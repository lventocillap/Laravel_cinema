<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailSale\DetailSaleRequest;
use App\Models\DetailSale;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DetailSaleController extends Controller
{
    public function store(DetailSaleRequest $request)
    {
        $user = Auth::user();

        $sale = Sale::create([
            'user_id' => $user->id,
            'date' => now(),
            'total_price' => $request->price,
        ]);

        DetailSale::create([
            'sale_id' => $sale->id,
            'billboard_id' => $request->billboard_id,
            'seat_id' => $request->seat_id,
            'price' => $request->price,
        ]);

        return new JsonResponse(['mesage' => 'Inserted Sale'], Response::HTTP_CREATED);
    }
}
