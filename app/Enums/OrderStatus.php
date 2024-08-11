<?php

namespace App\Enums;

enum OrderStatus:int 
{
    case Pending=1;
    case Processing=2;
    case Shipped=3;
    case Complete=4;
    case Cancelled=5;
    case Failed=6;
    case Refunded=7;
   
   
}