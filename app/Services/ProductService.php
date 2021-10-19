<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
   public function create($name, $description, $price, $quantity, $image): void
   {
      Product::create([
         'name' => $name,
         'decription' => $description,
         'price' => $price,
         'quantity' => $quantity,
      ]);
   }
}
