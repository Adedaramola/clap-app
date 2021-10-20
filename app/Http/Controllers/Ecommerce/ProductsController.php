<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
   public function all()
   {
      $products = Product::all();

      return ProductResource::collection($products);
   }

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required',
         'description' => 'required',
         'price' => 'required',
         'quantity' => 'required'
      ]);

      $product = $request->user()->products()->create($request->all());
      if ($request->hasFile('image') && $request->file('image')->isValid()) {
         $product->addMediaFromRequest('image')->toMediaCollection('image');
      }

      return $this->sendResponse($product);
   }
}
