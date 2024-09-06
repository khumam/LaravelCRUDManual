<x-home-layout>
    <x-slot:title>Product</x-slot:title>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name">Product name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Product description</label>
                        <textarea type="text" name="description" id="description"
                            class="form-control">{{ $product->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price">Product price</label>
                        <input type="number" min="0" name="price" id="price" class="form-control"
                            value="{{ $product->price }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Product status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="PUBLISHED" @if($product->status ==='PUBLISHED' ) selected @endif>PUBLISH</option>
                            <option value="DRAFT" @if($product->status ==='DRAFT' ) selected @endif>DRAFT</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Save product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-home-layout>
