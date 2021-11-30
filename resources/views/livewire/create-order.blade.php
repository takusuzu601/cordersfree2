<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="連絡先" />
                <x-jet-input wire:model.defer="contact" type="text" placeholder="商品を受け取る人の名前を入力してください"
                    class="w-full" />
                <x-jet-input-error for="contact" />
            </div>

            <div>
                <x-jet-label value="電話番号" />
                <x-jet-input wire:model.defer="phone" type="text" placeholder="電話番号を入力してください" class="w-full" />
                <x-jet-input-error for="phone" />
            </div>

        </div>

        {{-- Alpine Jsで表示非表示 --}}
        {{-- envio_type=1or2で表示：非表示を切り替え --}}
        {{-- input redio x-model="envio_typeで判別" --}}
        <div x-data="{envio_type: @entangle('envio_type')}">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">
                輸送
            </p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input x-model="envio_type" type="radio" value="1" class="text-gray-600" name="envio_type">
                <span class="ml-2 text-gray-600">
                    店頭で受け取る(Calle falsa 123)
                </span>
                <span class="font-semibold text-gray-700 ml-auto">
                    無料
                </span>
            </label>

            <div class="bg-white rounded-lg shadow ">

                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="2" class="text-gray-600" name="envio_type">
                    <span class="ml-2 text-gray-600">
                        配達
                    </span>
                </label>
                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{'hidden':envio_type != 2}">
                    {{-- Departmentの選択 --}}
                    <div>
                        <x-jet-label value="部署の選択" />
                        <select class="form-control w-full" wire:model="department_id">
                            <option value="" disabled selected>部署の選択</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="department_id" />
                    </div>
                    {{-- Cityの選択 --}}
                    <div>
                        <x-jet-label value="県庁所在地の選択" />
                        <select class="form-control w-full" wire:model="city_id">
                            <option value="" disabled selected>県庁所在地の選択</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="city_id" />
                    </div>

                    {{-- Distritosの選択 --}}
                    <div>
                        <x-jet-label value="地域の選択" />
                        <select class="form-control w-full" wire:model="district_id">
                            <option value="" disabled selected>地域の選択</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="district_id" />
                    </div>

                    <div>
                        <x-jet-label value="Direccion" />
                        <x-jet-input class="w-full" wire:model="address" type="text" />
                        <x-jet-input-error for="address" />
                    </div>
                    <div class="col-span-2">
                        <x-jet-label value="Referencia" />
                        <x-jet-input class="w-full" wire:model="references" type="text" />
                        <x-jet-input-error for="references" />
                    </div>

                </div>
            </div>
        </div>

        <div>
            {{-- wire:loading.attr="disabled"
            wire:target="create_order"
            で2度押し防止 --}}
            <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4"
                wire:click="create_order">
                購入を続行します
            </x-jet-button>
        </div>
        <hr>
        <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem dolorum
            magni pariatur ullam deserunt
            officiis doloribus, quasi unde sed recusandae, praesentium iure quaerat quidem, aliquid esse porro. Amet,
            consequatur labore. <a href="" class="font-semibold text-orange-500">プライバシーポリシー</a></p>
    </div>
    <div class="col-span-2">

        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p>Cant:{{ $item->qty }}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">-Color:{{ $item->options['color'] }}</p>
                                @endisset

                                @isset($item->options['size'])
                                    <p>{{ $item->options['size'] }}</p>
                                @endisset

                            </div>
                            <p>Price{{ $item->price }}</p>
                        </article>

                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            現在カートはからです
                        </p>
                    </li>
                @endforelse
            </ul>
            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{ Cart::subtotal() }}USD</span>
                </p>
                <p class="flex justify-between items-center">
                    配送料
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            無料
                        @else
                            {{ $shipping_cost }}USD
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">合計</span>
                    @if ($envio_type == 1)
                        {{ Cart::subtotal() }}USD
                    @else
                        {{ Cart::subtotal() + $shipping_cost }}USD
                    @endif
                </p>

            </div>
        </div>

    </div>
</div>
