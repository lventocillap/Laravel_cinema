<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\SaleStrategy\Strategy;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Src\DetailSale\Utils\CreateDetailSale;
use Src\Sale\Application\UseCase\CreateNewSale;
use Src\Profile\Application\UseCase\GetIdProfile;
use Src\Seat\Application\DTO\SeatAvalaibleRequest;
use Src\Seat\Application\UseCase\UpdatesSeatsStatus;
use Src\DetailSale\Application\UseCase\NewDetailSale;
use Src\Profile\Application\DTO\ProfileDocumentNumberRequest;
use Src\DetailSale\Infrastructure\SaleStrategy\Interface\StrategySaleInterface;

class UnverifiedProfile implements StrategySaleInterface
{
    use CreateDetailSale;
    public function __construct(
        private GetIdProfile $getIdProfile,
        private CreateNewSale $createNewSale,
        private NewDetailSale $newDetailSale,
        private UpdatesSeatsStatus $updatesSeatsStatus,
    ) {}
    public function registerSale(Request $request): JsonResponse
    {
        DB::transaction(function () use ($request) {
            $profileId = $this->getIdProfile->execute(new ProfileDocumentNumberRequest($request->Profile['DNI']))->id;
            $saleId = $this->createNewSale->execute($request->price_id, $profileId)->id;
            $this->executeCreateDetailSale($this->newDetailSale, $request, $saleId);
            $this->updatesSeatsStatus->execute(new SeatAvalaibleRequest($request->seat_id));
        });
        return new JsonResponse([
            'message' => ['Create new Sale', 'Profile no verificate']
        ]);
    }
}
