<x-app-layout>

    <section class="w-full flex flex-col items-center px-3" x-data="{ 'showModal': false }">
        
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="/storage/{{ $product->product_image }}" alt="Nike Air">
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-2xl">{{ $product->name }}</h3>                
                <span class="text-gray-500 mt-3 text-lg">{{ __('De R$') }} <strike>{{ $product->getInitialPrice() }}</strike></span>
                                
                <livewire:product-price :product="$product" />

                <hr class="my-3">
                                
                <div class="flex items-center mt-6">
                    @auth
                        <div class="mr-2"><input type="text" placeholder="email" value="{{ auth()->user()->email }}" type="email" class="rounded"></div>                        
                        {{-- <a href="/checkout/{{ $product->id }}" class="px-8 py-2 h-10 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">{{ __('Comprar agora!') }}</a> --}}
                        <button @click="showModal = true" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">{{ __('Comprar agora!') }}</button>
                    @else
                        <div class="mr-2 bg-blue-500 rounded text-white p-2"><a href="/login">{{ __('Você precisa efetuar o Login para comprar!') }}</a></div>
                    @endauth                    
                </div>
            </div>
        </div>

        <div class="mt-5 shadow p-3">
            <p class="py-2">{{ __('Descrição do Produto') }}</p>
            <p>{!! $product->description !!}</p>
        </div>

    

          <!-- Modal -->
          <div
              class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
              x-show="showModal"
          >
              <!-- Modal inner -->
              <div
                  class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg h-48"
                  @click.away="showModal = false"
                  x-transition:enter="motion-safe:ease-out duration-300"
                  x-transition:enter-start="opacity-0 scale-90"
                  x-transition:enter-end="opacity-100 scale-100"
              >
                  <!-- Title / Close-->
                  <div class="flex items-center justify-between">
                      <h5 class="mr-3 text-black max-w-none">{{ __('Confirmação') }}</h5>
      
                      <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                      </button>
                  </div>
      
                  <!-- content -->
                  <div class="h-28">
                    <div class="py-4">
                        <p class="py-2">{{ __('Deseja realmente receber o link para comprar este produto?') }}</p>
                        <div class="flex justify-end mt-3">
                            <a href="/checkout/{{ $product->id }}" class="bg-green-700 text-white px-12 py-2 rounded mr-2">{{ __('Quero!') }}</a>
                            <a href="#" @click="showModal = false" class="bg-red-700 text-white px-3 py-2 rounded">{{ __('Vou perder!') }}</a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      
                         
    </section>      

</x-app-layout>