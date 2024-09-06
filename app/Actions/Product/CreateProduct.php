<?php

namespace App\Actions\Product;

use App\Models\Product;

class CreateProduct
{
    /**
     * Create a new class instance.
     */
    public function __invoke(object $product)
    {
        return Product::create([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'status' => $product->status,
        ]);
    }
}
