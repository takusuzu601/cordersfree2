<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="bg-white rounded-lg shadow-lg px-6 py-8 mb-6 flex items-center">

            <div class="relative">
                <div
                    class="{{ $order->status >= 2 && $order->Status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div
                class="{{ $order->status >= 3 && $order->Status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $order->status >= 3 && $order->Status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div
                class="{{ $order->status >= 4 && $order->Status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $order->status >= 4 && $order->Status != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase">
                <span class="font-semibold">Numero de ordern</span>:Order-{{ $order->id }}
            </p>
            @if ($order->status == 1)
                <x-button-enlace class="ml-auto" href="{{ route('orders.payment', $order) }}">
                    ?????????????????????
                </x-button-enlace> 
            @endif
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">
                        ????????????
                    </p>
                    @if ($order->envio_type == 1)
                        <p class="text-sm">???????????????????????????????????????????????????</p>
                        <p class="text-sm">??????????????????????????????123</p>
                    @else
                        <p class="text-sm">???????????????????????????</p>
                        <p class="text-sm">{{ $order->address }}</p>
                        <p>{{ $order->department->name }} -
                            {{ $order->city->name }}-{{ $order->district->name }}
                        </p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">
                        ?????????
                    </p>
                    <p class="text-sm">???????????????????????????{{ $order->contact }}</p>
                    <p class="text-sm">?????????{{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">
                ??????
            </p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>PRICE</th>
                        <th>??????</th>
                        <th>??????</th>
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

</x-app-layout>
