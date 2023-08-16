<div wire:poll>
    {{-- Do your work, then step back. --}}
    <p class="font-bold px-4 py-3 text-xl">Preço Inicial: <strike>R$1000,00</strike></p>
    Preço:<span class="font-bold px-4 py-3 text-xl"> R${{ $product->getInitialPrice() }} </span>    
    <p>
        Current time: {{ now() }}
    </p>   
</div>