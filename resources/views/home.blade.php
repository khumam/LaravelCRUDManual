<x-home-layout>
    <x-slot:title>My Homepage</x-slot:title>

    <div class="d-flex align-items-center justify-content-center mt-4">
        <a href="{{ route('product.index') }}" class="btn btn-success">Product management</a>
    </div>
</x-home-layout>
