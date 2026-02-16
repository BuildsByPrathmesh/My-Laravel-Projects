<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">
            Admin Dashboard
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Total Products --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-sm text-gray-500 dark:text-gray-400">Total Products</h2>
                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ $totalProducts }}
                </p>
            </div>

            {{-- Total Orders --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-sm text-gray-500 dark:text-gray-400">Total Orders</h2>
                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ $totalOrders }}
                </p>
            </div>

            {{-- Total Revenue --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-sm text-gray-500 dark:text-gray-400">Total Revenue</h2>
                <p class="text-3xl font-bold text-green-600">
                    ₹ {{ $totalRevenue }}
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
