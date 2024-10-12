<?php

namespace App\Enums;

enum SeatEnum:string
{
    case seat1 ='A1';
    case seat2 ='A2';
    case seat3 ='A3';
    case seat4 ='A4';
    case seat5 ='A5';
    case seat6 ='B1';
    case seat7 ='B2';
    case seat8 ='B3';
    case seat9 ='B4';
    case seat10 ='B5';

    public function roomId():int
    {
        return match($this){
            self::seat1 => 1,
            self::seat2 => 1,
            self::seat3 => 1,
            self::seat4 => 1,
            self::seat5 => 1,
            self::seat6 => 2,
            self::seat7 => 2,
            self::seat8 => 2,
            self::seat9 => 2,
            self::seat10 => 2,
        };
    }

    public function status():string
    {
        return match($this){
            self::seat1 => 1,
            self::seat2 => 1,
            self::seat3 => 1,
            self::seat4 => 1,
            self::seat5 => 1,
            self::seat6 => 1,
            self::seat7 => 1,
            self::seat8 => 1,
            self::seat9 => 1,
            self::seat10 => 1,
        };
    }
}
