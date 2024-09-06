<?php

namespace App\Actions\Product;

use App\Models\Product;

class GetProduct
{
    /**
     * Create a new class instance.
     */
    public function __invoke()
    {
        return Product::latest()
            ->get(['id', 'name', 'description', 'status', 'price']);
    }
}
