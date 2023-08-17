<x-app-layout>

    <section class="w-full flex flex-col items-center px-3">
        
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="/storage/{{ $product->product_image }}" alt="Nike Air">
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-xl">{{ $product->name }}</h3>
                <span class="text-gray-500 mt-3 text-lg">{{ __('De R$') }} <strike>{{ $product->getInitialPrice() }}</strike></span>
                                
                <livewire:product-price :product="$product" />

                <hr class="my-3">
                
                <div class="flex items-center mt-6">
                    <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">{{ __('Comprar agora!') }}</button>
                    <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        
         
        {{-- <button class="bg-green-500 rounded-lg px-4 py-2 text-white">{{ __('Comprar Agora!') }}</button> --}}
    </section>

    

</x-app-layout>