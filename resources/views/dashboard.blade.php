<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold mb-4">Dashboard</h2>

                    <p class="text-gray-700 dark:text-gray-300">
                        Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>
                    </p>

                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Role: <span class="font-semibold capitalize">{{ Auth::user()->role }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
