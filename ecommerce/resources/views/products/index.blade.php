<x-app-layout>
    <div class="p-6">

        {{-- Page Title --}}
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">
            Products
        </h1>

        {{-- Admin Only → Add Product Button --}}
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('products.create') }}"
               class="inline-block mb-4 bg-blue-600 hover:bg-blue-700
                      text-white px-4 py-2 rounded shadow">
                Add Product
            </a>
        @endif


        {{-- Products Table --}}
        <table class="w-full border rounded-lg overflow-hidden">

            {{-- Table Head --}}
            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-left">Stock</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>

            {{-- Table Body --}}
            <tbody class="divide-y dark:divide-gray-700">

                @forelse($products as $product)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                        <td class="p-3 text-gray-900 dark:text-gray-100">
                            {{ $product->name }}
                        </td>

                        <td class="p-3 text-gray-900 dark:text-gray-100">
                            ₹ {{ $product->price }}
                        </td>

                        <td class="p-3 text-gray-900 dark:text-gray-100">
                            {{ $product->stock }}
                        </td>

                        <td class="p-3">

                            {{-- Admin Controls --}}
                            @if(auth()->user()->role === 'admin')

                                <a href="{{ route('products.edit', $product) }}"
                                   class="text-blue-600 hover:underline mr-3">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this product?')"
                                            class="text-red-600 hover:underline mr-3">
                                        Delete
                                    </button>
                                </form>

                            @endif

                            {{-- All Users → Add to Cart --}}
                            <form action="{{ route('cart.add', $product) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                <button class="text-green-600 hover:underline">
                                    Add to Cart
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4"
                            class="text-center p-6 text-gray-500 dark:text-gray-400">
                            No products found.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</x-app-layout>
