<x-app-layout>

    <div class="grid grid-cols-5 gap-6 container py-8">
        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase">
                    <span class="font-semibold">Numero de ordern</span>:Order-{{ $order->id }}
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">
                            発送詳細
                        </p>
                        @if ($order->envio_type == 1)
                            <p class="text-sm">商品は店舗で受け取る必要があります</p>
                            <p class="text-sm">フォールスストリート123</p>
                        @else
                            <p class="text-sm">商品は発送されます</p>
                            <p class="text-sm">{{ $order->address }}</p>
                            <p>{{ $order->department->name }} -
                                {{ $order->city->name }}-{{ $order->district->name }}
                            </p>
                        @endif
                    </div>
                    <div>
                        <p class="text-lg font-semibold uppercase">
                            連絡先
                        </p>
                        <p class="text-sm">商品を受け取る人：{{ $order->contact }}</p>
                        <p class="text-sm">連絡先{{ $order->phone }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
                <p class="text-xl font-semibold mb-4">
                    概要
                </p>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>PRICE</th>
                            <th>数量</th>
                            <th>合計</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex">
                                        <img src="{{ $item->options->image }}" alt=""
                                            class="h-15 w-20 object-cover mr-4">
                                        <article>
                                            <h1 class="font-bold">
                                                {{ $item->name }}
                                            </h1>
                                            <div class="flex text-xs">
                                                @isset($item->options->color)
                                                    Color:{{ __($item->options->color) }}
                                                @endisset
                                                @isset($item->options->size)
                                                    -{{ __($item->options->size) }}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>

                                <td class="text-center">
                                    {{ $item->price }}USD
                                </td>
                                <td class="text-center">
                                    {{ $item->qty }}
                                </td>
                                <td class="text-center">
                                    {{ $item->price * $item->qty }}USD
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>

        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-2 pt-6">
                <div class="flex justify-between items-center mb-4">
                    <img class="h-12" src="{{ asset('img/card01.jpg') }}" alt="">
                    <div class="text-gray-700">
                        <p class="text-base font-semibold uppercase">
                            商品代金:{{ $order->total - $order->shipping_cost }}USD
                        </p>
                        <p class="text-base font-semibold uppercase">
                            送料:{{ $order->shipping_cost }}USD
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            合計:{{ $order->total }}USD
                        </p>
                        <div class="cho-container">

                        </div>
                    </div>
                </div>

                <div id="paypal-button-container"></div>

            </div>

        </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value:"{{$order->total}}"
                        }
                    }]
                });
            }
        }).render('#paypal-button-container');
    </script>

</x-app-layout>
