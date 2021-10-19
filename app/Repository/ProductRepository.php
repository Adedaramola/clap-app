<?php

namespace App\Repository;

use App\Contracts\ProductInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository extends Repository implements ProductInterface
{
   /**
    * ProductRepository constructor
    *
    * @param Product $product
    */
   public function __construct(Product $product)
   {
      parent::__construct($product);
   }

   /**
    *
    * @return Collection
    */
   public function all(): Collection
   {
      return $this->product->all();
   }
}
