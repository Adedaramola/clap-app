<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class StallController extends Controller
{
   public function index()
   {
      $stalls = User::where('is_stall', true)->paginate(100);
      return $this->sendResponse($stalls);
   }

   public function show($id)
   {
      $stall = User::where('is_stall', true)->where('id', $id)->get();
      
      if($stall){
         return new UserResource($stall);
      }
   }
}
