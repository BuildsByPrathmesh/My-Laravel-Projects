<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Products</h1>

        <a href="{{ route('products.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            Add Product
        </a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Stock</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td class="p-2 border">{{ $product->name }}</td>
                        <td class="p-2 border">₹ {{ $product->price }}</td>
                        <td class="p-2 border">{{ $product->stock }}</td>
                        <td class="p-2 border">
    <a href="{{ route('products.edit', $product) }}" class="text-blue-500 mr-2">Edit</a>

    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')

        <button onclick="return confirm('Delete this product?')" class="text-red-500">
            Delete
        </button>
    </form>
    <form action="{{ route('cart.add', $product) }}" method="POST" class="inline">
    @csrf
    <button class="text-green-600 ml-2">
        Add to Cart
    </button>
</form>
</td>




                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
