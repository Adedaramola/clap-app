<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'rating',
      'comment'
   ];


   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function stall()
   {
      return $this->belongsTo(Stall::class);
   }

   protected static function boot()
   {
      parent::boot();

      if (auth()->check()) {
         self::creating(function ($model) {
            $model->user_id = auth()->id();
         });
      }
   }
}
