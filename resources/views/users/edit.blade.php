<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajmen User > Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="md:flex md:items-center mb-3">
                            <div class="md:w-1/3">
                                <label class="block  font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Nama Lengkap
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-slate-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500"
                                    id="inline-full-name" type="text" name="name" value="{{ $user->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-3">
                            <div class="md:w-1/3">
                                <label class="block  font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-username ">
                                    Username
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-slate-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500"
                                    id="inline-username" type="text" name="username" value="{{ $user->username }}">
                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-3">
                            <div class="md:w-1/3">
                                <label class="block  font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-email">
                                    Email
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-slate-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500"
                                    id="inline-email" type="text" name="email" value="{{ $user->email }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-3">
                            <div class="md:w-1/3">
                                <label class="block  font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-role">
                                    Roles
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-orange-500"
                                    id="inline-role" name="roles">
                                    @if ($user->roles->pluck('name')->implode(',') == 'Dewa')
                                        @can('only dewa')
                                            <option selected value="Dewa">Dewa</option>
                                            <option value="Admin">Admin</option>
                                        @endcan
                                        <option value="Ranger">Ranger</option>
                                    @elseif ($user->roles->pluck('name')->implode(',') == 'Admin')
                                        @can('only dewa')
                                            <option value="Dewa">Dewa</option>
                                            <option selected value="Admin">Admin</option>
                                        @endcan
                                        <option value="Ranger">Ranger</option>
                                    @else
                                        @can('only dewa')
                                            <option value="Dewa">Dewa</option>
                                            <option value="Admin">Admin</option>
                                        @endcan
                                        <option selected value="Ranger">Ranger</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-3">
                            <div class="md:w-1/3">
                                <label class="block  font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-foto ">
                                    Foto
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-slate-50 rounded w-full py-2 px-4 text-gray-700 leading-tight "
                                    id="inline-foto" type="file" name="profil" accept="image/*">
                                <x-input-error :messages="$errors->get('profil')" class="mt-2" />
                            </div>
                        </div>
                        <button type="submit"
                            class="bg-green-500 p-3 rounded-lg font-bold text-white shadow-md">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
