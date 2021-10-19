<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
   use HandlesAuthorization;


   public function create(User $user)
   {
      return auth()->check() && $user->is_stall;
   }
}
