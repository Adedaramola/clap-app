<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
   public function index(Request $request)
   {
      $request->validate(['email' => 'required|email']);

      $status = Password::sendResetLink(
         $request->only('email')
      );

      return $status === Password::RESET_LINK_SENT
         ? response()->json(['status' => __($status)])
         : response()->json(['email' => __($status)]);
   }
}
