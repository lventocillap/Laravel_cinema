<?php

declare(strict_types=1);

namespace Src\Profile\Application\UseCase;

use Exception;
use Illuminate\Http\JsonResponse;
use Src\Profile\Application\DTO\IdProfileResponse;
use Src\Profile\Application\DTO\ProfileIndependentRequest;
use Src\Profile\Domain\Interface\ProfileInterface;

class CreateProfileIndependent
{
    public function __construct(
        private ProfileInterface $profileInterface
    ) {}
    public function execute(ProfileIndependentRequest $request): IdProfileResponse
    {
        $profile = $this->profileInterface->storeProfileIndependent(
            documentNumber: $request->documentNumber,
            cellphone: $request->cellphone,
            emailVerification: $request->emailVerification,
            name: $request->name
        );
        return new IdProfileResponse($profile->getId());
    }
}
