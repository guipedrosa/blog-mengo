<x-app-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        
        Um Produto! Aqui!!
        <livewire:product-price :product="$product" /> 
        <button class="bg-green-500 rounded-lg px-4 py-2 text-white">Comprar Agora!</button>
    </section>

</x-app-layout>