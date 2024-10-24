<?php

declare(strict_types=1);

namespace Src\DetailSale\Infrastructure\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Src\DetailSale\Utils\CreateDetailSale;
use Src\Profile\Application\DTO\ProfileDocumentNumberRequest;
use Src\Profile\Application\UseCase\VerificateDocumentNumber;
use Src\DetailSale\Infrastructure\SaleStrategy\Handler\SaleHandler;
use Src\DetailSale\Infrastructure\SaleStrategy\Strategy\NoneProfile;
use Src\DetailSale\Infrastructure\SaleStrategy\Strategy\VerifiedProfile;
use Src\DetailSale\Infrastructure\SaleStrategy\Strategy\UnverifiedProfile;


class DetailSaleController
{
    use CreateDetailSale;
    public function __construct(
        private SaleHandler $saleHandler,
        private VerificateDocumentNumber $verificateDocumentNumber,
    ) {}
    public function storeDetailSale(Request $request): JsonResponse
    {
        $validation = $this->verificateDocumentNumber->execute(new ProfileDocumentNumberRequest($request->Profile['DNI']));
        switch ($validation) {
            case 1:
                $this->saleHandler->setStrategySalClass(VerifiedProfile::class);
                return $this->saleHandler->porcessSale($request);
            case 2:
                $this->saleHandler->setStrategySalClass(UnverifiedProfile::class);
                return $this->saleHandler->porcessSale($request);
            case 3:
                $this->saleHandler->setStrategySalClass(NoneProfile::class);
                return $this->saleHandler->porcessSale($request);
        }
    }
}
