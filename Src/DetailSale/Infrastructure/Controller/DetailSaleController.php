<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\Controller;

use App\Http\Requests\DetailSale\DetailSaleRequest as AppDetailSaleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Src\DetailSale\Application\DTO\DetailSaleRequest;
use Src\DetailSale\Application\UseCase\NewDetailSale;
use Src\Sale\Application\UseCase\CreateNewSale;
use Src\Seat\Application\UseCase\UpdatesSeatsStatus;

class DetailSaleController
{
    public function __construct(
        private NewDetailSale $newDetailSale,
        private CreateNewSale $createNewSale,
        private UpdatesSeatsStatus $updatesSeatsStatus
    ) {}
    public function newDetailSale(APPDetailSaleRequest $request): void
    {
        DB::transaction(function () use ($request) {
            $sale = $this->createNewSale->execute($request->price_id);
            $this->newDetailSale->execute(new DetailSaleRequest(
                $sale->getId(),
                $request->billboard_id,
                $request->seat_id,
                $request->price_id
            ));
            $this->updatesSeatsStatus->execute($request->seat_id);
            return new JsonResponse([
                'message' => 'create new Sale'
            ]);
        });
    }
}
