<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajmen User > List User') }}
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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('users.create') }}">
                        <button class="bg-green-500 mb-3 p-2 rounded-md font-extrabold text-white">Tambah User</button>
                    </a>
                    <table class="border-collapse border border-slate-400 rounded-md table-auto w-full">
                        <thead class="bg-orange-300">
                            <tr>
                                <th class="border border-slate-400 w-1/12">No.</th>
                                <th class="border border-slate-400">Nama</th>
                                <th class="border border-slate-400">Role</th>
                                <th class="border border-slate-400">Edit & Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $key => $user)
                                <tr class="h-10">
                                    <td class="border border-slate-400">{{ $key + 1 }}</td>
                                    <td class="border border-slate-400">{{ $user->name }}
                                    </td>
                                    <td class="border border-slate-400">{{ $user->roles->pluck('name')->implode(',') }}
                                    </td>
                                    <td class="border border-slate-400">
                                        <div class="flex justify-center p-3">
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                class="text-orange-400 bg-black p-1 rounded-md text-lg mr-3"><i
                                                    class="bi bi-gear-fill"></i></a>
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 bg-slate-600 p-1 rounded-md text-lg"
                                                    type="submit"><i class="bi bi-trash-fill"></i></button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</x-app-layout>
