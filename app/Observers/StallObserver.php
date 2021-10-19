<?php

namespace App\Observers;

use App\Models\Stall;
use Illuminate\Support\Str;

class StallObserver
{
   public function created(Stall $stall)
   {
      $stall->wallet()->create([
         'id' => '$' . Str::camel($stall->name)
      ]);
   }
}
