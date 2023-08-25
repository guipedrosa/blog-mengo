<x-app-layout>

    <section class="w-full shadow p-2 rounded">
        <h2 class="py-3 px-1 text-lg">Histórico de Pedidos</h2>
        
            <table class="w-full text-sm text-left text-white overflow-x-auto">
                <thead class="text-xs text-white uppercase bg-blue-600">
                  <tr>
                    <th scope="col" class="md:px-1 py-3 px-4">#</th>
                    <th scope="col" class="md:px-1 py-3 px-4">Produto</th>
                    <th scope="col" class="md:px-1 py-3 px-4">Quantidade</th>
                    <th scope="col" class="md:px-1 py-3 px-4">Total</th>
                    <th scope="col" class="md:px-1 py-3 px-4">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="even:bg-gray-200 odd:bg-gray-300 border-b-gray-600 text-black">
                            <td class="md:px-1 py-4 px-4"></td>
                            <td class="md:px-1 py-4 px-4 text-clip">{{ $order->product->name }}</td>
                            <td class="md:px-1 py-4 px-4">{{ $order->qty }} </td>
                            <td class="md:px-1 py-4 px-4 truncate">{{ __('R$') }} {{ $order->getSubtotal() }} </td>
                            <td>Ver Pedido</td>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>
            {{ $orders->links() }}                   
    </section>

</x-app-layout>