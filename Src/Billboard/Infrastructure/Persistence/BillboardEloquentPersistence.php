<?php
declare(strict_types=1);

namespace Src\Billboard\Infrastructure\Persistence;

use App\Models\Billboard as AppBillboard;
use Src\Billboard\Domain\Interface\BillboardInterface;
use Src\Billboard\Domain\Model\Billboard;

class BillboardEloquentPersistence implements BillboardInterface
{
    public function index(): array
    {
        $billboards = AppBillboard::all();

        return $billboards->map(function ($billboard){
            return new Billboard(
                $billboard->id,
                $billboard->movie_id,
                $billboard->room_id,
                $billboard->star_date,
                $billboard->end_date
            );
        })->toArray();
    }
}