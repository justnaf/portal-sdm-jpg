<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="py-10 bg-green-200 rounded-md mb-3 text-center" id="notify">
                    <h4 class="text-slate-600">{{ session('success') }}</h4>
                </div>
            @endif
            @if (session('warning'))
                <div class="py-10 bg-orange-200 rounded-md mb-3 text-center" id="notify">
                    <h4 class="text-slate-600">{{ session('warning') }}</h4>
                </div>
            @endif
            @if (session('error'))
                <div class="py-10 bg-orange-200 rounded-md mb-3 text-center" id="notify">
                    <h4 class="text-slate-600">{{ session('error') }}</h4>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <form action="{{ route('presensi.create') }}">
                        <table class="w-4/12">
                            <tr>
                                <td class="text-left">Status</td>
                                <td class="w-1/12 text-center">:</td>
                                <td>
                                    <select name="status" id="status" class="appareance-none border-2 rounded-lg">
                                        <option value="datang">Datang</option>
                                        <option value="pulang">Pulang</option>
                                        <option value="izin">Izin</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">Latitude</td>
                                <td class="w-1/12 text-center">:</td>
                                <td><input type="text" name="latitude" id="latitude" readonly required
                                        class="border-0 focus:ring-0">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">Longitude</td>
                                <td class="w-1/12 text-center">:</td>
                                <td><input type="text" name="longitude" id="longitude" readonly required
                                        class="border-0 focus:ring-0 ">
                                </td>
                            </tr>
                            <tr class="h-14">
                                <td colspan="3" class="text-center"><button onclick="getLocation()"
                                        class="rounded-md bg-orange-600 p-2 text-white font-bold">Aktifkan
                                        Lokasi</button>
                                </td>
                            </tr>
                            <tr class="h-14">
                                <td colspan="3" class="text-center"><button
                                        class="rounded-md bg-green-600 p-2 text-white font-bold"
                                        type="submit">Absen</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            var notify = document.getElementById("notify");
            notify.classList.add('hidden');
        }, 2000);
    </script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
        }
    </script>
</x-app-layout>
