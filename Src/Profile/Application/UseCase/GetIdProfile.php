<?php

declare(strict_types=1);

namespace Src\Profile\Application\UseCase;

use Src\Profile\Application\DTO\IdProfileResponse;
use Src\Profile\Application\DTO\ProfileDocumentNumberRequest;
use Src\Profile\Domain\Interface\ProfileInterface;

class GetIdProfile
{
    public function __construct(
        private ProfileInterface $profileInterface
    ) {}
    public function execute(ProfileDocumentNumberRequest $request):IdProfileResponse
    {
        $profile = $this->profileInterface->getIdProfile($request->documentNumber);
        return new IdProfileResponse($profile->getId());
    }
}
