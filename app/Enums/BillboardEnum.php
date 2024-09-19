<?php

namespace App\Enums;

enum BillboardEnum:string
{
    case Billboard1 = '1';
    
    public function roomId():string
    {
        return match($this){
            self::Billboard1 => '1',
        };
    }

    public function starDate():string
    {
        return match($this){
            self::Billboard1 => '2024-11-04'
        };
    }

    public function endDate():string
    {
        return match($this){
            self::Billboard1 => '2024-12-12'
        };
    }
}
