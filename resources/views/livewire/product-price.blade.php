<div wire:poll>
    {{-- Do your work, then step back. --}}
    <p>
        {{ __('Por') }}: <span class="font-bold py-3 text-xl"> R${{ $product->getInitialPrice() }}</span>    
        <br />
        <div class="mt-3">{{ date('d/m/Y H:i:s') }}</div>
    </p>
</div>