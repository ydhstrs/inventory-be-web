<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="icon" type="image/icon type" href="{{ asset('assets/logo.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <nav class="px-2 py-4 bg-secondaryColor text-white border-gray-200  ">
        <div class="px-2 flex flex-wrap items-center justify-between mx-auto">
            <a href="#" class="flex items-center">
                <img src="{{ asset('assets/logo.png') }}" class="h-6 mr-3 sm:h-9" alt=" Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white flex gap-2">BPBD <span
                        class="hidden md:block md:w-fit">Provinsi Sumatera Utara</span></span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500  rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden bg-secondaryColor w-full md:block md:w-auto " id="navbar-dropdown">
                <ul
                    class=" flex flex-col bg-secondaryColor p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 ">
                    <x-guest-nav-link :active="request()->routeIs('home')">
                        <a href="{{ route('home') }}"
                            class="block py-2 pl-3 pr-4 text-white text-lg font-semibold rounded md:bg-transparent md:text-blue-700 md:p-0 "
                            aria-current="page">Peralatan</a>
                    </x-guest-nav-link>
                    <x-guest-nav-link :active="request()->routeIs('logistik')">
                        <a href="{{ route('logistik') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-lg font-semibold">Logistik</a>
                    </x-guest-nav-link>
                    <x-guest-nav-link :active="request()->routeIs('distribusi')">
                        <a href="{{route('distribusi')}}"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 text-gray-400 text-lg font-semibold">Distirbusi</a>
                    </x-guest-nav-link>
                    <li class="p-2">
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  text-lg font-semibold">Regulasi</a>
                    </li>
                    <li class="p-2">
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  text-lg font-semibold">Gallery</a>
                    </li>
                    <li class="p-2">
                        <a href="{{ route('login') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  text-lg font-semibold">
                            @if (Auth::check())
                                Dashboard
                            @else
                                Login
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-full bg-secondaryColor h-80 flex flex-shrink-0 relative items-center">
        <img src="{{ asset('assets/background.png') }}" class="sm:w-screen w-screen h-80 opacity-40" alt="Logo" />
        <span class="absolute center text-white sm:text-5xl text-2xl  font-bold  align-middle text-center w-full ">
            Aplikasi Pengelola Inventaris dan Logistik <br />
            BPBD Provinsi Sumatera Utara</span>
    </div>

    @yield('container')

    <footer class="mt-20 bg-secondaryColor pt-20">
        <div class="bg-secondaryColor flex flex-col ">

            <div class="flex flex-row justify-center mt-20">
                <a href="">
                    <img src="{{ asset('assets/facebook.png') }}" class="h-6 mr-3 sm:h-8" alt="Facebook" />
                </a>
                <a href="">
                    <img src="{{ asset('assets/twitter.png') }}" class="h-6 mr-3 sm:h-8" alt="Twitter" />
                </a>
                <a href="">
                    <img src="{{ asset('assets/instagram.png') }}" class="h-6 mr-3 sm:h-8" alt="Instagram" />
                </a>
            </div>
            <div class="flex flex-row items-center py-8 justify-center">
                <img src="{{ asset('assets/logo.png') }}" class="h-6 mr-3 sm:h-10" alt="Logo" />
                <span class="self-center text-white text-xl font-semibold whitespace-nowrap ">
                    BPBD Provinsi SumateraUtara
                </span>
            </div>
        </div>
        <div class="bg-primaryColor h-10 flex items-center py-8">
            <span class="text-white text-center w-full">Copyright ?? 2020. All right reserved</span>
        </div>
    </footer>

</body>

</html>

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>