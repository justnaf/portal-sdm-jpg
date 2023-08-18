<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Beranda') }}
            <span id="current-time" class="ml-4 font-light text-sm text-red-600"></span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Selamat Datang ' . Auth::user()->name . ' Semoga Harimu Menyenangkan') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        let time = document.getElementById("current-time");

        setInterval(() => {
            let d = new Date();
            time.innerHTML = d.toLocaleString('en-GB');
        }, 1000);
    </script>
</x-app-layout>
