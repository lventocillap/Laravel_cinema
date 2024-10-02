<?php
declare(strict_types=1);

namespace Src\Sale\Infrastructure\Persistence;

use App\Models\Price;
use App\Models\Sale as AppSale;
use Illuminate\Support\Facades\Auth;
use Src\Sale\Domain\Interface\SaleInterface;

class SaleEloquentPersistence implements SaleInterface
{
    public function newSale(array $priceIds): AppSale
    {
        $total = 0;
        foreach($priceIds as $priceId){
            $price = Price::find($priceId);
            if($price){
                $total += $price->price;
            }
        }
        $sale = AppSale::create([
            'user_id' => Auth::user()->id,
            'date' => now(),
            'total_price' => $total
        ]);
        return $sale;
    }
}