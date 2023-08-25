<x-app-layout>
   
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        {{ __("Oi") }}, {{ auth()->user()->name }}. {{ __("Seja bem-vindo!") }}
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <ul>
            <li class="inline"><a href="/profile" class="bg-green-800 rounded-lg px-4 py-2 text-white md:w-1/5 m-1">{{ __('Meu Perfil') }}</a></li>
            <li class="inline"><a href="/user-orders" class="bg-green-800 rounded-lg px-4 py-2 text-white md:w-1/5 m-1">{{ __('Histórico de Compras') }}</a></li>
        </ul>        
    </div>
   
</x-app-layout>
