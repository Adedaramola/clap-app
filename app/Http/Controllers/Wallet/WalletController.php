<?php

namespace App\Http\Controllers\Wallet;

use App\Facades\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
   public function transfer(Request $request)
   {
      return Wallet::transfer($request->sender_id, $request->receiver_id, $request->amount);
   }


   public function deposit(Request $request)
   {
   }


   public function withdraw(Request $request)
   {
   }

   public function transactions(Request $request)
   {
      $transactions = $request->user()->transactions ?? [];
      return $this->sendResponse($transactions);
   }
}
