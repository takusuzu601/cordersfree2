<div>
    {{-- x-jet-dropdown with="96"はvendor/jetstreamで設定している --}}
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="white" size="30" /> 
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>            </span>

        </x-slot>
        <x-slot name="content">
            <div class="py-6 px-4">
                <p class="text-center text-gray-700"> 
                    現在カートはからです
                </p>
            </div>
        </x-slot>
    </x-jet-dropdown>
</div>
