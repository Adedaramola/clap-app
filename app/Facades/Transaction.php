<?php

namespace App\Facades;

use App\Services\TransactionService;
use Illuminate\Support\Facades\Facade;

class Transaction extends Facade
{
   protected static function getFacadeAccessor()
   {
      return TransactionService::class;
   }
}
