<?php

namespace App\Enums;

enum RoomStatusesEnum: string
{
    case Libre = 'Libre';
    case Ocupado = 'Ocupado';
    case Mantenimiento = 'Mantenimiento';
}
