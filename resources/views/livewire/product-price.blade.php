<div wire:poll>
    {{-- Do your work, then step back. --}}
    Preço:<span class="font-bold px-4 py-3 text-xl"> R${{ $product->getInitialPrice() }} </span>
    <p>
        Current time: {{ now() }}
    </p>   
</div>