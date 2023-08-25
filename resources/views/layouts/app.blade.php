<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zefini | Sempre mais barato!</title>
    <meta name="author" content="">
    <meta name="description" content="">

    <!-- Tailwind -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-family-karla" x-cloak >

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between" x-data="{ openProfile : false }">
            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="/">Shop</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="/blog">Blog</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="/sobre">Sobre</a></li>
                </ul>
            </nav>

            <div x-data="{dropdownMenu: false}" class="relative mr-1" @click.outside="dropdownMenu = false" @close.stop="dropdownMenu = false">
                <!-- Dropdown toggle button -->
                <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center p-2 bg-white rounded-md">
                    <span class="">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </span>
                </button>
                <!-- Dropdown list -->
                <div x-show="dropdownMenu" class="absolute right-0 py-2 mt-2 bg-white bg-gray-100 rounded-md shadow-xl w-44">
                    @auth                                        
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                            {{ __('Perfil') }}
                        </a>
                        <a href="/user-orders" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                            {{ __('Pedidos') }}
                        </a>                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    @else 
                        <a href="/login" class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-gray-400 hover:text-white">
                            {{ __('Login') }}
                        </a>
                    @endauth        
                </div>
            </div>


        </div>
    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-5">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="/">
                <img src="/images/logo10.png" />                
            </a>
            <p class="text-lg text-gray-600">
                Sempre mais barato!
            </p>
        </div>
    </header>

    <x-categories-menu />

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->        
        {{ $slot }}

    </div>

    <footer class="w-full border-t bg-white pb-12">       
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>

@livewireScripts
</body>
</html>
