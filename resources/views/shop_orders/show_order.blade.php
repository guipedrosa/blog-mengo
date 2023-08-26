<x-app-layout>

    <section class="w-full flex justify-center">
        
        <div class="shadow p-2 m-5">
            <h2>{{ __('Pedido') }}: {{ $order->order_code }}</h2>
            <p>{{ __('Produto') }}: {{ $order->product->name }}</p>
            <p>{{ __('Quantidade') }}: {{ $order->qty }}</p>
            <p>{{ __('Total:') }} {{ __('R$') }} {{ $order->getSubtotal() }}</p>
        </div>

        <div class="shadow p-5 m-5">
            <img class="rounded h-48" src="/storage/{{ $order->product->product_image }}" alt="{{ $order->product->name }}">
        </div>

    </section>

</x-app-layout>