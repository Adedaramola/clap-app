<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

use function PHPUnit\Framework\throwException;

class Handler extends ExceptionHandler
{
   /**
    * A list of the exception types that are not reported.
    *
    * @var array
    */
   protected $dontReport = [
      //
   ];

   /**
    * A list of the inputs that are never flashed for validation exceptions.
    *
    * @var array
    */
   protected $dontFlash = [
      'current_password',
      'password',
      'password_confirmation',
   ];

   /**
    * Register the exception handling callbacks for the application.
    *
    * @return void
    */
   public function register()
   {
      $this->renderable(function (NotFoundHttpException $e, $request) {
         if ($request->is('api/*')) {
             return response()->json([
                 'message' => 'Resource not found'
             ], 404);
         }
     });
   }


   protected function unauthenticated($request, AuthenticationException $exception)
   {
      return response()->json([
         'error' => 'Unauthenticated'
      ], 401);
   }
}
