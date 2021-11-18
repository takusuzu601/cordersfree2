<div x-data>

    

    <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">
        {{-- $product->stockでModel Productのアクセサを呼び出し数量を出している --}}
            Stock disponible:</span>{{$product->stock}}</p>
    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button
             disabled 
             {{-- disabledにqtyが一以下の場合trueが入る --}} 
             x-bind:disabled="$wire.qty <= 1"
            wire:loading.attr="disabled" 
            wire:target="decrement" 
            wire:click="decrement">
                -
        </x-jet-secondary-button>
            <span class="mx-2 text-gray-700">{{ $qty }}</span>
            <x-jet-secondary-button
            disabled
         {{-- disabledにqtyが一以下の場合trueが入る --}} 
         x-bind:disabled="$wire.qty >= $wire.quantity"
         wire:loading.attr="disabled" 
         wire:target="increment" 
         wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button 
                x-bind:disabled="$wire.qty >= $wire.quantity"
                class="w-full"
                wire:click="addItem"
                wire:loading.attr="disables"
                wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
