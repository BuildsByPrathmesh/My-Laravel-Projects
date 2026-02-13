<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ $product->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Price</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">New Image</label>
                <input type="file" name="image" class="w-full">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Update Product
            </button>
        </form>
    </div>
</x-app-layout>
