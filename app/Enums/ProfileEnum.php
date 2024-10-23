<?php

namespace App\Enums;

enum ProfileEnum: string
{
    case Profile1 = "Luis Fernando";
    case Profile2 = "Diego Ocares";
    case Profile3 = "Henry Sanchez";
    
    public function userId():?int
    {
        return match($this){
            self::Profile1 => 1,
            self::Profile2 => 2,
            self::Profile3 => null,
        };
    }
    public function documentNumber():string
    {
        return match($this){
            self::Profile1 => "12345678",
            self::Profile2 => "87456321",
            self::Profile3 => "74185296",
        };
    }
    public function emailVerification():string
    {
        return match($this){
            self::Profile1 => "luis@gmail.com",
            self::Profile2 => "diego@gmail.com",
            self::Profile3 => "henry@gmail.com",
        };
    }
    public function cellphone():string
    {
        return match($this){
            self::Profile1 => "123456789",
            self::Profile2 => "987456321",
            self::Profile3 => "741852963",
        };
    }
}
