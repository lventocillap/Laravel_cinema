<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\Controller;

use App\Http\Requests\DetailSale\DetailSaleRequest as AppDetailSaleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Src\DetailSale\Application\UseCase\NewDetailSale;
use Src\DetailSale\Utils\CreateDetailSale;
use Src\Profile\Application\DTO\ProfileDocumentNumberRequest;
use Src\Profile\Application\DTO\ProfileIndependentRequest;
use Src\Profile\Application\UseCase\CreateProfileIndependent;
use Src\Profile\Application\UseCase\GetIdProfile;
use Src\Profile\Application\UseCase\GetIdProfileVerificate;
use Src\Profile\Application\UseCase\VerificateDocumentNumber;
use Src\Sale\Application\UseCase\CreateNewSale;
use Src\Seat\Application\DTO\SeatAvalaibleRequest;
use Src\Seat\Application\UseCase\UpdatesSeatsStatus;

class DetailSaleController
{
    use CreateDetailSale;
    public function __construct(
        private GetIdProfile $getIdProfile,
        private NewDetailSale $newDetailSale,
        private CreateNewSale $createNewSale,
        private UpdatesSeatsStatus $updatesSeatsStatus,
        private CreateProfileIndependent $createProfileIndependent,
        private VerificateDocumentNumber $verificateDocumentNumber,
        private GetIdProfileVerificate $getIdProfileAuthentificate,
    ) {}
    public function storeDetailSale(Request $request): JsonResponse
    {
        $validation = $this->verificateDocumentNumber->execute(new ProfileDocumentNumberRequest($request->Profile['DNI']));
        if($validation === 'none'){
            DB::transaction(function () use ($request) {
                $profileId = $this->getIdProfile->execute(new ProfileDocumentNumberRequest($request->Profile['DNI']))->id;
                $saleId = $this->createNewSale->execute($request->price_id, $profileId)->id;
                $this->executeCreateDetailSale($this->newDetailSale, $request, $saleId);
                $this->updatesSeatsStatus->execute(new SeatAvalaibleRequest($request->seat_id));
            });
            return new JsonResponse([
                'message' => 'create new Sale'
            ]);
        }elseif($validation){
            DB::transaction(function () use ($request) {
                $profileId = $this->getIdProfileAuthentificate->execute(new ProfileDocumentNumberRequest($request->Profile['DNI']))->id;
                $saleId = $this->createNewSale->execute($request->price_id, $profileId)->id;
                $this->executeCreateDetailSale($this->newDetailSale, $request, $saleId);
                $this->updatesSeatsStatus->execute(new SeatAvalaibleRequest($request->seat_id));
            });
            return new JsonResponse([
                'message' => ['Create new Sale', 'User authtentificate']
            ]);
        }elseif(!$validation){
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
                'message' => ['Create new Profile','Create new Sale']
            ]);
        }
        
    }
}
