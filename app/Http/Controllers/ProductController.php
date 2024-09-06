<?php

namespace App\Http\Controllers;

use App\Actions\Product\CreateProduct;
use App\Actions\Product\DeleteProduct;
use App\Actions\Product\GetProduct;
use App\Actions\Product\UpdateProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetProduct $getProduct)
    {
        $products = $getProduct();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, CreateProduct $createProduct)
    {
        $product = (object) $request->validated();
        $isCreated = $createProduct($product);

        return $isCreated ? redirect()->route('product.index')->with('success', 'Product has been created')
            : back()->with('error', 'Failed to add product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProduct $updateProduct)
    {
        $request = (object) $request->validated();
        $isUpdated = $updateProduct($request, $product->id);

        return $isUpdated ? redirect()->route('product.index')->with('success', 'Product has been updated')
            : back()->with('error', 'Failed to update product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, DeleteProduct $deleteProduct)
    {
        $isDeleted = $deleteProduct($product->id);

        return $isDeleted ? back()->with('success', 'Product has been updated')
            : back()->with('error', 'Failed to update product');
    }
}
