<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\SaleStrategy\Strategy;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Src\DetailSale\Utils\CreateDetailSale;
use Src\Sale\Application\UseCase\CreateNewSale;
use Src\Seat\Application\DTO\SeatAvalaibleRequest;
use Src\Seat\Application\UseCase\UpdatesSeatsStatus;
use Src\DetailSale\Application\UseCase\NewDetailSale;
use Src\Profile\Application\DTO\ProfileIndependentRequest;
use Src\Profile\Application\UseCase\CreateProfileIndependent;
use Src\DetailSale\Infrastructure\SaleStrategy\Interface\StrategySaleInterface;

class NoneProfile implements StrategySaleInterface
{
    use CreateDetailSale;
    public function __construct(
        private NewDetailSale $newDetailSale,
        private CreateNewSale $createNewSale,
        private UpdatesSeatsStatus $updatesSeatsStatus,
        private CreateProfileIndependent $createProfileIndependent,
    ) {}
    public function registerSale(Request $request): JsonResponse
    {
        DB::transaction(function () use ($request) {
            $profileId = $this->createProfileIndependent->execute(new ProfileIndependentRequest(
                $request->Profile['DNI'],
                $request->Profile['cellphone'],
                $request->Profile['email'],
                $request->Profile['name']
            ))->id;
            $saleId = $this->createNewSale->execute($request->price_id, $profileId)->id;
            $this->executeCreateDetailSale($this->newDetailSale, $request, $saleId);
            $this->updatesSeatsStatus->execute(new SeatAvalaibleRequest($request->seat_id));
        });
        return new JsonResponse([
            'message' => ['Create new Profile', 'Create new Sale']
        ]);
    }
}
