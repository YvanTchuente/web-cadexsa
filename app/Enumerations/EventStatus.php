<?php

namespace App\Enumerations;

enum EventStatus: int
{
    case UPCOMING = 0;
    case OCCURRED = 1;
}
