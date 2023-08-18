<div class="w-[250px] top-0 bottom-0 lg:left-0 p-2 duration-300 overflow-hidden bg-gradient-to-t from-gray-600 to-gray-900 h-full"
    id="sidebar">
    <div class="text-gray-100 text-xl mt-6">
        <div class="p-2.5 flex items-center">
            <img class="w-10 px-0.5 py-0.5 rounded-md bg-blue-600" src="img/logo.png">
            <h1 class="font-bold text-gray-200 text-[15px] mx-auto">JPG ADMIN</h1>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
    </div>
    <a href="{{ route('dashboard') }}">
        @if (request()->routeIs('dashboard'))
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-blue-600 text-white">
                <i class="bi bi-house-door-fill"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Beranda</span>
            </div>
        @else
            <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-house-door-fill"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Beranda</span>
            </div>
        @endif
    </a>
    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-bookmark-fill"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Presensi</span>
    </div>
    <div class="my-4 bg-gray-600 h-[1px]"></div>
    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        onclick="dropdown1()">
        <i class="bi bi-chat-left-text-fill"></i>
        <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Underconstruction</span>
            <span class="text-sm rotate-180" id="arrow1">
                <i class="bi bi-chevron-down"></i>
            </span>
        </div>
    </div>
    <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu1">
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Absensi
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Profile
        </h1>
        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Pengumpulan
        </h1>
    </div>
    @if (request()->routeIs('profile.*'))
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-blue-600 text-white"
            onclick="dropdown2()">
            <i class="bi bi-person-circle"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">{{ Auth::user()->name }}</span>
                <span class="text-sm rotate-180" id="arrow2">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu2">
            <a href="{{ route('profile.edit') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">

                    Profile Edit
                </h1>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full items-start cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Logout
                </button>
            </form>
        </div>
    @else
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
            onclick="dropdown2()">
            <i class="bi bi-person-circle"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">{{ Auth::user()->name }}</span>
                <span class="text-sm rotate-180" id="arrow2">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </div>
        </div>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu2">
            <a href="{{ route('profile.edit') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">

                    Profile Edit
                </h1>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full items-start cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Logout
                </button>
            </form>
        </div>
    @endif

</div>
