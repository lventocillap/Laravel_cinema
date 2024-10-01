<?php 
declare(strict_types=1);

namespace App\Services\Sale;

use App\Http\Controllers\DetailSaleController;
use App\Models\Price;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class SaleServices
{
    static function SaleStore($request):Sale
    {
        $priceIds = $request->price_id;
        $totalPrice = 0;
        foreach ($priceIds as $priceId) {
            $price = Price::find($priceId);
            if ($price) {
                $totalPrice += $price->price;
            }
        }
        $user = Auth::user();
        $sale = Sale::create([
            'user_id' => $user->id,
            'date' => now(),
            'total_price' => $totalPrice,
        ]);
        return $sale;
    }
}