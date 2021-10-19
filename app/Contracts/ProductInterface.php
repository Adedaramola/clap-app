<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ProductInterface
{
   public function all(): Collection;
}
