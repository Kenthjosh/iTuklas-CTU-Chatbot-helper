<?php

namespace App;

enum Status: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DONE = 'done';
}
