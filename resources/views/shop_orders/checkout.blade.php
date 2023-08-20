<x-app-layout>

    <section class="w-full flex flex-col items-center px-3">
        
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="/storage/{{ $product->product_image }}" alt="Nike Air">
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-2xl">{{ $product->name }}</h3>                
                {{-- <span class="text-gray-500 mt-3 text-lg">{{ __('De R$') }} <strike>{{ $product->getInitialPrice() }}</strike></span> --}}
                                
                {{-- <livewire:product-price :product="$product" /> --}}

                <hr class="my-3">
                                
                <div class="flex items-center mt-6">
                    @auth
                        <div>
                            <div class="py-3 text-lg">Parabéns!</div>
                            <div>Uma unidade do <span class="text-blue-800">{{ $product->name }}</span> foi reservada! Agora utilize este <a href="/checkout/payment" target="_blank" class="text-red-500">Link de Pagamento</a> ou o enviado por email para garantir seu produto!</div>
                            <div class="bg-yellow-300 rounded p-2 mt-4">Você deve efetuar o pagamento em até 1h. Se não concluir a compra dentro deste prazo, a unidade deste produto será desbloqueada para outra pessoa.</div>
                        </div>
                    @endauth                    
                </div>
            </div>
        </div>

        <div class="mt-5 shadow p-3">
            <p class="py-2">{{ __('Descrição do Produto') }}</p>
            <p>{!! $product->description !!}</p>
        </div>
                         
    </section>      

</x-app-layout>