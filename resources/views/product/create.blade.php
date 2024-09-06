<x-home-layout>
    <x-slot:title>Product</x-slot:title>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Product name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Product description</label>
                        <textarea type="text" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price">Product price</label>
                        <input type="number" min="0" name="price" id="price" class="form-control" value="{{ old('price') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Product status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="PUBLISHED" @if(old('status') === 'PUBLISHED') selected @endif>PUBLISH</option>
                            <option value="DRAFT" @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Add product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-home-layout>
