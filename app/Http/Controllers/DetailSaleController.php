<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailSale\DetailSaleRequest;
use App\Models\DetailSale;
use App\Models\Sale;
use App\Services\Sale\SaleServices;
use App\Services\Seat\SeatService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DetailSaleController extends Controller
{
    public function store(DetailSaleRequest $request)
    {
        $pricesId = $request->price_id;
        $seatsId = $request->seat_id; 
        $sale = SaleServices::SaleStore($request);

        if(count($pricesId) !== count($seatsId)){
            return new JsonResponse(['message' => 'They are not the same']);
        }
        foreach($seatsId as $index => $seat){
            DetailSale::create([
                'sale_id' => $sale->id,
                'billboard_id' => $request->billboard_id,
                'seat_id' => $seat,
                'price_id' => $pricesId[$index],
            ]);
        }
        SeatService::seatStatusUpdate($request);
        return new JsonResponse(['mesage' => 'Inserted Sale'], Response::HTTP_CREATED);
    }
}
