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
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div class="flex flex-col justify-center">
                        <div class="flex justify-center">
                            @if (Auth::user()->profile_pic_path == 1)
                                <img src="{{ asset('image/ava.png') }}" alt=""
                                    class="rounded-full w-24 h-24 mb-3">
                            @else
                                <img src="{{ Auth::user()->profile_pic_path }}" alt=""
                                    class="rounded-full w-24 h-24 mb-3">
                            @endif
                        </div>
                        <h2 class="text-center font-bold text-lg">{{ Auth::user()->name }}</h2>
                        @if (count($presensi) == 0)
                            <p class="w-full text-sm text-gray-600 flex items-center">
                                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                </svg>
                                Belum Presensi
                            </p>
                        @else
                            @if ($presensi[0]->status == 'izin')
                                <div class="font-extrabold text-purple-700">Yah Kamu Kenapa Izin Hari Ini? Kalau Sakit
                                    Semoga Lekas Sembuh Ya🥲</div>
                            @elseif (count($presensi) == 1)
                                <div class="font-extrabold text-orange-500">Selamat Memulai Pekerjaan Hari Ini</div>
                            @elseif (count($presensi) == 2)
                                <div class="font-extrabold text-green-700">Terima Kasih Untuk Hari Ini, Selamat
                                    Beristirahat😉</div>
                            @endif
                        @endif
                        <a href="{{ route('presensi.index') }}" class="text-center">
                            <button class="bg-green-500 rounded-md p-3 mt-3 text-white">Absen</button>
                        </a>
                    </div>
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
