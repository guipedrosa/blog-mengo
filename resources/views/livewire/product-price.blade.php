<div wire:poll>
    {{-- Do your work, then step back. --}}
    <div class="flex">
        <div class="">{{ __('Por') }}: <span class="font-bold py-3 text-xl"> R${{ $product->getActualPrice() }}</span> </div>
        <div class="px-2"> <img class="h-8" src="/images/caindo2.gif" alt=""> </div>
        <div class="">{{ date('d/m/Y H:i:s') }}</div>        
    </div>
    <hr class="my-3" />
    <div class="text-xl text-gray-800">{{ __('Restam apenas') }} <span class="text-blue-800 font-bold">{{ $product->qty_in_stock }}</span> deste produto!</div>
</div>