<?php

namespace App\Actions\Product;

use App\Models\Product;

class UpdateProduct
{
    /**
     * Create a new class instance.
     */
    public function __invoke(object $product, $id)
    {
        return Product::where('id', $id)
            ->update([
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'status' => $product->status,
            ]);
    }
}
