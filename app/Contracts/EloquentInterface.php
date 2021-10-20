<?php
namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EloquentInterface {

   /**
    * create
    *
    * @param  mixed $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * find
    *
    * @param  mixed $id
    * @return Model
    */
   public function find($id): ?Model;

   /**
    * 
    * @return Collection
    */
   public function all(): Collection;
}
