<div wire:poll.3000ms>
    {{-- Do your work, then step back. --}}
    <div class="flex">
        <div class="">{{ __('De') }}: <strike>{{ $product->getInitialPrice() }}</strike>
            <br /> {{ __('por') }}: <span class="font-bold py-3 text-md"> R${{ $product->getActualPrice() }}</span> </div>
        <div class="px-2"> <img class="h-6" src="/images/caindo2.gif" alt=""> </div>        
    </div>    
    {{-- <div class="text-xl text-gray-800">{{ __('Restam apenas') }} <span class="text-blue-800 font-bold">{{ $product->qty_in_stock }}</span> deste produto!</div> --}}
</div>