<div class="container py-8">
    <section class="bg-white rounded-lg drop-shadow-lg p-6 text-gray-700">
        <h1 class="text-lg font-semibold mb-6">‎ショッピングカート‎</h1>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>価格</th>
                    <th>数量</th>
                    <th>合計</th>
                </tr>
            </thead>
            <tbody>

                @foreach (Cart::content() as $item)

                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                <div>
                                    <p class="font-bold">{{ $item->name }}</p>
                                    @if ($item->options->color)
                                        <span class="mr-1">
                                            Color:{{ __($item->options->color) }}
                                        </span>
                                    @endif

                                    @if ($item->options->size)
                                        <span class="mx-1">--</span>
                                        <span>
                                            {{ $item->options->size }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <span>USD{{ $item->price }}</span>
                            <a href="" class="ml-6 cursor-pointer hover:text-red-600">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td>
                            @if ($item->options->size)

                                @livewire('update-cart-item-size',['rowId'=>$item->rowId],key($item->rowId))

                            @elseif($item->options->color)

                                @livewire('update-cart-item-color',['rowId'=>$item->rowId],key($item->rowId))

                            @else
                                {{-- {{$item->rowIdはCart内のアイテムのID}} --}}
                                @livewire('update-cart-item',['rowId'=>$item->rowId],key($item->rowId))
                                
                            @endif
                        </td>
                        <td></td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </section>
</div>
