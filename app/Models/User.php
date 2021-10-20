<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
   use HasFactory, Notifiable;

   protected $fillable = [
      'username',
      'name',
      'email',
      'phone',
      'password',
      'is_stall'
   ];


   protected $hidden = [
      'password',
      'remember_token',
   ];


   protected $casts = [
      'email_verified_at' => 'datetime',
   ];


   public function wallet()
   {
      return $this->hasOne(Wallet::class);
   }


   public function products()
   {
      return $this->hasMany(Product::class);
   }


   public function sendPasswordResetNotification($token)
   {
      $this->notify(new ResetPassword($token));
   }


   public function sendEmailVerificationNotification()
   {
      $this->notify(new VerifyEmail);
   }

   public function getJWTIdentifier()
   {
      return $this->getKey();
   }


   public function getJWTCustomClaims()
   {
      return [];
   }

   protected static function boot()
   {
      parent::boot();

      self::creating(function ($model) {
         $model->slug = Str::slug($model->name);
      });
   }
}
