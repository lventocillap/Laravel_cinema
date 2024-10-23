<?php
declare(strict_types=1);

namespace Src\Billboard\Infrastructure\Persistence;

use Src\Movie\Domain\Model\Movie;
use Src\Billboard\Domain\Model\Billboard;
use App\Models\Billboard as AppBillboard;
use Src\Billboard\Domain\Interface\BillboardInterface;

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
    public function show($id): Billboard
    {
        $billboard = AppBillboard::find($id);
        $movie = new Movie(
            $billboard->movie->id,
            $billboard->movie->title,
            $billboard->movie->gender,
            $billboard->movie->time,
            $billboard->movie->premiere,
            $billboard->movie->status_id
        );
        return new Billboard(
            $billboard->id,
            $movie,
            $billboard->room_id,
            $billboard->star_date,
            $billboard->end_date
        );
    }
}