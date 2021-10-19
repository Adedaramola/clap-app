<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('wallets', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('tag')->unique()->index();
         $table->foreignId('user_id')->constrained()->cascadeOnDelete();
         $table->decimal('balance', 20, 4)->default(0);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('wallets');
   }
}
