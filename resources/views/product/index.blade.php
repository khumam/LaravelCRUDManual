<x-home-layout>
    <x-slot:title>Product</x-slot:title>

    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('product.create') }}" class="btn btn-success">Add product</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product management</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>{{ $product->status }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$product->id}}">
                                        Hapus
                                    </button>
                                    <div class="modal fade" id="modal{{$product->id}}" tabindex="-1" aria-labelledby="modal{{$product->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modal{{$product->id}}Label">Hapus produk?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah kamu ingin menghapus produk <b>{{ $product->name }}</b>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" id="delete-product-{{ $product->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger" form="delete-product-{{ $product->id }}">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-home-layout>
