<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{

   public function authorize()
   {
      return true;
   }


   public function rules()
   {
      return [
         'name' => 'required|string',
         'username' => 'required|string|unique:users',
         'email' => 'required|string|email|unique:users',
         'phone' => 'required|string|size:11|unique:users',
         'password' => ['required', 'string', Password::min(8)->mixedCase()],
         'is_stall' => 'nullable'
      ];
   }
}
