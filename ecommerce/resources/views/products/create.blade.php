<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Product</h1>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Stock</label>
                <input type="number" name="stock" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Image</label>
                <input type="file" name="image" class="w-full">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Save Product
            </button>
        </form>
    </div>
</x-app-layout>
