<x-app-layout>
    <div class="py-10">
        <div class="max-w-5xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6
                    text-gray-900 dark:text-gray-100">

            <h1 class="text-2xl font-bold mb-6">My Orders</h1>

            @if($orders->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">
                    You have not placed any orders yet.
                </p>
            @else

                @foreach($orders as $order)
                    <div class="mb-8 border dark:border-gray-700 rounded-lg p-4">

                        {{-- Order header --}}
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="font-semibold">
                                    Order #{{ $order->id }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $order->created_at->format('d M Y, h:i A') }}
                                </p>
                            </div>

                            <p class="font-bold text-lg">
                                ₹ {{ $order->total }}
                            </p>
                        </div>

                        {{-- Items table --}}
                        <table class="w-full border rounded-lg overflow-hidden">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <tr>
                                    <th class="p-2 text-left">Product</th>
                                    <th class="p-2 text-left">Price</th>
                                    <th class="p-2 text-left">Qty</th>
                                    <th class="p-2 text-left">Total</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach($order->items as $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="p-2">{{ $item->product->name }}</td>
                                        <td class="p-2">₹ {{ $item->price }}</td>
                                        <td class="p-2">{{ $item->quantity }}</td>
                                        <td class="p-2 font-semibold">
                                            ₹ {{ $item->price * $item->quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @endforeach

            @endif

        </div>
    </div>
</x-app-layout>
