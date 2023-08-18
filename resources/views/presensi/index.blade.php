<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="max-w-sm w-full lg:max-w-full lg:flex">
                <div
                  class="border-r border-b border-l border-gray-400 sm:border-l-4 sm:border-t sm:border-gray-400 bg-white rounded p-4 flex flex-col justify-between leading-normal">
                  <div class="flex flex-wrap mb-4 items-center justify-items-start">
                    <img class="w-14 h-14 rounded-full mr-4" src="{{ asset('/image/ava.png') }}" alt="Avatar of Jonathan Reinink">
                    <div class="ml-2">
                      <p class="text-gray-900 text-sm">Jonathan Reinink</p>
                      <p class="w-full text-sm text-gray-600 flex items-center">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20">
                          <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                        </svg>
                        Belum Presensi
                      </p>
    
                    </div>
                    <p class="ml-10 text-gray-600 text-sm">time</p>
    
                  </div>
                  <div class="flex items-center">
                    <div class="text-gray-900 font-bold text-xl pb-4">Silahkan presensi sesuai dengan kondisi</div>
                   
    
                  </div>
                  <div class="flex flex-row items-center justify-between w-full mb-6 md:mb-0">
                    <label class="mr-2 block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-state">
                      Presensi
                    </label>
                    <div class="relative mr-2">
                      <select
                        class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-1.5 px-4 mr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option>Berangkat</option>
                        <option>Pulang</option>
                        <option>Izin</option>
                        <option>Tidak Ada</option>
                      </select>
                    </div>
                    <button
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 border border-blue-700 rounded shadow-md">
                      Simpan
                    </button>
                  </div>
                </div>
              </div>

        </div>
    </div>
</x-app-layout>
