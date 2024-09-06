<?php

namespace App\Actions\Product;

use App\Models\Product;

class DeleteProduct
{
    /**
     * Create a new class instance.
     */
    public function __invoke($id)
    {
        return Product::where('id', $id)->delete();
    }
}
