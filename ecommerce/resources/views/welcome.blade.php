<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Web</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100
             min-h-screen flex items-center justify-center">

    <div class="text-center space-y-8 px-6">

        {{-- Animated Title --}}
        <h1 class="text-4xl md:text-6xl font-extrabold
                   bg-gradient-to-r from-blue-600 to-purple-600
                   bg-clip-text text-transparent
                   animate-pulse">
            E-commerce Web
        </h1>

        {{-- Subtitle --}}
        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-xl mx-auto">
            A full-stack Laravel e-commerce system featuring authentication,
            product management, cart, checkout, order history, admin dashboard,
            and dark-mode UI.
        </p>

        {{-- Small Portfolio Section --}}
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6
                    max-w-xl mx-auto">
            <h2 class="text-xl font-semibold mb-2">About the Developer</h2>

            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                Built by Prathmesh, a passionate full-stack developer focused on creating
                real-world web applications using Laravel, Tailwind CSS,
                and modern backend architecture.
            </p>
        </div>

        {{-- Auth Buttons --}}
        <div class="flex items-center justify-center gap-4">

            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700
                          text-white font-medium shadow">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700
                          text-white font-medium shadow">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-6 py-2 rounded-lg bg-gray-200 dark:bg-gray-700
                          hover:bg-gray-300 dark:hover:bg-gray-600
                          font-medium">
                    Register
                </a>
            @endauth

        </div>

    </div>

</body>
</html>
