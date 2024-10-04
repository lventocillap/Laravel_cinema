<?php
declare(strict_types=1);

namespace Src\Sale\Infrastructure\Persistence;

use App\Models\Price;
use App\Models\Sale as AppSale;
use Illuminate\Support\Facades\Auth;
use Src\Sale\Domain\Interface\SaleInterface;
use Src\Sale\Domain\Model\Sale;

class SaleEloquentPersistence implements SaleInterface
{
    public function newSale(array $priceIds): Sale
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
            'date' => '03-11-24',
            'total_price' => $total
        ]);
        return new Sale(
            $sale->id,
            $sale->user_id,
            $sale->date,
            $sale->total_price
        );
    }
}