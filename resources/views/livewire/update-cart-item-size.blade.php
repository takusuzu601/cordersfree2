<div class="flex item-center" x-data>
    <x-jet-secondary-button disabled {{-- disabledにqtyが一以下の場合trueが入る --}} x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
        wire:target="decrement" wire:click="decrement">
        -
    </x-jet-secondary-button>
    <span class="mx-2 text-gray-700">1</span>
    <x-jet-secondary-button disabled {{-- disabledにqtyが一以下の場合trueが入る --}} x-bind:disabled="$wire.qty >= $wire.quantity"
        wire:loading.attr="disabled" wire:target="increment" wire:click="increment">
        +
    </x-jet-secondary-button>
</div>
