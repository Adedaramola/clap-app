<?php

namespace App\Repository;

use App\Contracts\EloquentInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Repository implements EloquentInterface
{
   /**
    *
    * @var Model
    */
   protected $model;

   /**
    * Repository constructor
    *
    * @param  Model
    */
   public function __construct(Model $model)
   {
      $this->model = $model;
   }

   /**
    *
    * @param  mixed $attributes
    * @return Model
    */
   public function create(array $attributes): Model
   {
      return $this->model->create($attributes);
   }

   /**
    *
    * @param  mixed $id
    * @return Model
    */
   public function find($id): ?Model
   {
      return $this->model->find($id);
   }

   /**
    * 
    * @return Collection
    */
   public function all(): Collection
   {
      return $this->model->all();
   }
}
