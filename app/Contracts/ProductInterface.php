<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ProductInterface
{
   public function all(): Collection;

   public function create(array $attributes): Model;
}
