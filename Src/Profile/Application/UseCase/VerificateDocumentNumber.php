<?php

declare(strict_types=1);

namespace Src\Profile\Application\UseCase;

use Src\Profile\Application\DTO\ProfileDocumentNumberRequest;
use Src\Profile\Domain\Interface\ProfileInterface;

class VerificateDocumentNumber
{
    public function __construct(
        private ProfileInterface $profileInterface
    ) {}
    public function execute(ProfileDocumentNumberRequest $request): int
    {
        return $this->profileInterface->verificateProfile($request->documentNumber);
    }
}
