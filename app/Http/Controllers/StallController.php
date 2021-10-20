<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Stall;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StallController extends Controller
{
   public function index()
   {
      $stalls = User::where('is_stall', true)->paginate(100);
      return $this->sendResponse($stalls);
   }

   public function show(User $user)
   {
      $stall = DB::table('users')
         ->where('slug', $user->slug)
         ->where('is_stall')
         ->get();

      return $this->sendResponse($stall);
   }
}
