<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Menu <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">            
            @foreach($categories as $category)
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $category->title }}</a>            
            @endforeach            

            @auth
                <a href="{{ route('profile.edit') }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Perfil</a>                           
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>          
            @endauth
        </div>
    </div>           
</nav>