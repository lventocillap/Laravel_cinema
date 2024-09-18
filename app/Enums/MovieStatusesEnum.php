<?php

namespace App\Enums;

enum MovieStatusesEnum:string
{
    case Cartelera = 'Estreno';
    case Proximamente = 'Proximamente';
    case Relanzamiento = 'Relanzamiento';
    case Archivado = 'Archivado';
}
