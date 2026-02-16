<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6
                    text-gray-900 dark:text-gray-100">

            <h1 class="text-2xl font-bold mb-6">
                Your Cart
            </h1>

            @if(!$cart || $cart->items->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">
                    Your cart is empty.
                </p>
            @else
                <table class="w-full border rounded-lg overflow-hidden">
                    
                    {{-- Table Head --}}
                    <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="p-3 text-left">Product</th>
                            <th class="p-3 text-left">Price</th>
                            <th class="p-3 text-left">Quantity</th>
                            <th class="p-3 text-left">Total</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y dark:divide-gray-700">
                        @foreach($cart->items as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                                <td class="p-3 text-gray-900 dark:text-gray-100">
                                    {{ $item->product->name }}
                                </td>

                                <td class="p-3 text-gray-900 dark:text-gray-100">
                                    ₹ {{ $item->product->price }}
                                </td>

                                <td class="p-3 text-gray-900 dark:text-gray-100">
                                    {{ $item->quantity }}
                                </td>

                                <td class="p-3 font-semibold text-gray-900 dark:text-gray-100">
                                    ₹ {{ $item->product->price * $item->quantity }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
        <div class="mt-6 flex justify-end">
    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
            Place Order
        </button>
    </form>
</div>

    </div>
</x-app-layout>

