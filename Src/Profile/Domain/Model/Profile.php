<?php

declare(strict_types=1);

namespace Src\Profile\Domain\Model;

use Src\User\Domain\Model\User;

class Profile
{
    public function __construct(
        private int $id,
        private ?User $user,
        private string $documentNumber,
        private string $cellphone,
        private string $emailVerification,
        private string $name,
    ) {}
    public function getId():int
    {
        return $this->id;
    }
    public function getDocumentNumber():string
    {
        return $this->documentNumber;
    }
    public function getCellphone():string
    {
        return $this->cellphone;
    }
    public function getEmailVerification():string
    {
        return $this->emailVerification;
    }
    public function getName():string
    {
        return $this->name;
    }
    public function getUser():?User
    {
        return $this->user;
    }
}
