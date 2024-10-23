<?php
declare(strict_types=1);

namespace Src\Profile\Domain\Interface;

use Src\Profile\Domain\Model\Profile;

interface ProfileInterface
{
    public function verificateProfile(string $documentNumber):string|bool;
    public function storeProfileIndependent(string $documentNumber,string $cellphone,string $emailVerification,string $name):Profile;
    public function getIdProfile(string $documentNumber):Profile;
    public function getIdProfileAuthentificate(string $documentNumber):Profile;
}