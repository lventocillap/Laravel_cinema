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
    public function execute(ProfileDocumentNumberRequest $request): string|bool
    {
        return $this->profileInterface->verificateProfile($request->documentNumber);
    }
}
