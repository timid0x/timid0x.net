<x-app-layout>
    <div class="-mb-4 text-gray-700" x-data="{ pago: 1 }">

        <div class="grid grid-cols-1 lg:grid-cols-2">

            <div class="col-span-1 bg-white">
                <div class="lg:max-w-[40rem] py-12 px-4 lg:pr-8 sm:pl-6 lg:pl-8 ml-auto">
                    <h1 class="text-2xl font-semibold mb-2">
                        Pago
                    </h1>

                    <div class="shadow-lg rounded-lg overflow-hidden border border-gray-300">
                        <ul class="divide-y divide-gray-300">
                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="1">
                                    <span class="ml-2">
                                        Tarjeta de débito / crédito
                                    </span>
                                    <img class="h-6 ml-auto"
                                        src="https://ik.imagekit.io/timid0x/cards.png?updatedAt=1717269848805"
                                        alt="">

                                </label>
                                <div class="p-4 bg-gray-100 text-center" x-show="pago == 1">
                                    <i class="fa-regular fa-credit-card"></i>
                                    <p>
                                        Luego de click ser abrirá una nueva ventana para realizar el pago de forma
                                        segura
                                    </p>
                                </div>


                            </li>

                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="2">
                                    <span class="ml-2">
                                        Transferencia Bancaria / Yappy
                                    </span>
                                </label>
                                <div class="p-4 bg-gray-100 flex justify-center" x-cloak x-show="pago == 2">
                                    <div>
                                        <p>
                                            1. Yappy @timid0x
                                        </p>
                                        <p>
                                            Enviar comprobante a timid0x-player@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-span-1">
                <div class="lg:max-w-[40rem] py-12 px-4 lg:pl-8 sm:pr-6 lg:pr-8 mr-auto">
                    <ul class="space-y-4 mb-4">
                        @foreach (Cart::instance('shopping')->content() as $item)
                            <li class="flex items-center space-x-4">
                                <div class="flex-shrink-0 relative">
                                    <img class="h-12 w-12 aspct-square" src="{{ $item->options->image }}"
                                        alt="">
                                    <div
                                        class="flex items-center justify-center h-6 w-6 bg-green-700 bg-opacity-80 rounded-full absolute -right-2 -top-2">
                                        <span class="text-white text-xs font-semibold">
                                            {{ $item->qty }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <p>
                                        {{ $item->name }}
                                    </p>
                                </div>

                                <div class="flex-shrink-0">
                                    <p>
                                        ${{ $item->price }}
                                    </p>
                                </div>

                            </li>
                        @endforeach
                    </ul>

                    <div class="flex justify-between">
                        <p class="text-gray-700 font-semibold">
                            Subtotal
                        </p>
                        <p class="text-gray-700 font-semibold">
                            ${{ Cart::instance('shopping')->subtotal() }}
                        </p>

                    </div>

                    <hr class="my-3">

                    <div class="flex justify-between mb-4">
                        <p class="text-gray-900 text-lg font-bold">
                            Total
                        </p>
                        <p class="text-gray-900 text-lg font-bold">
                            ${{ Cart::instance('shopping')->subtotal() + 0.0 }}
                        </p>
                    </div>

                    <div class="">
                        <button onclick="VisanetCheckout.open()" class="btn btn-green w-full">
                            Finalizar pedido
                        </button>
                    </div>


                    @if (session('niubiz'))
                        @php
                            $niubiz = session('niubiz');
                            $response = $niubiz['response'];
                            $purchaseNumber = $niubiz['purchaseNumber'];

                        @endphp


                        @isset($response['data'])
                            <div role="alert">
                                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 mt-8">
                                    Error
                                </div>
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 ">
                                    <p class="mb-4">
                                        {{ $response['data']['ACTION_DESCRIPTION'] }}
                                    </p>
                                    <p>
                                        <b>Número de pedido: </b>
                                        {{ $purchaseNumber }}
                                    </p>
                                    <p>
                                        <b>Fecha/Hora de pedido</b>
                                        {{ now()->createFromFormat('ymdHis', $response['data']['TRANSACTION_DATE'])->format('d/m/Y H:i:s') }}
                                    </p>

                                    @isset($response['data']['CARD'])
                                        <p>
                                            <b>Tarjeta:</b>
                                            {{ $response['data']['CARD'] }} ({{ $response['data']['BRAND'] }})
                                        </p>
                                    @endisset


                                </div>
                            </div>
                        @endisset
                    @endif




                </div>
            </div>
        </div>

    </div>

    @push('js')
        <script type="text/javascript" src="{{ config('services.niubiz.url_js') }}"></script>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {

                let purchasenumber = Math.floor(Math.random() * 1000000000);
                let amount = {{ Cart::instance('shopping')->subtotal() + 0.0 }};


                VisanetCheckout.configure({
                    sessiontoken: '{{ $session_token }}',
                    channel: 'web',
                    merchantid: "{{ config('services.niubiz.merchant_id') }}",
                    purchasenumber: purchasenumber,
                    amount: amount,
                    expirationminutes: '20',
                    timeouturl: 'about:blank',
                    merchantlogo: 'img/comercio.png',
                    formbuttoncolor: '#000000',
                    action: '{{ route('checkout.paid') }}?amount=' + amount + '&purchaseNumber=' +
                        purchasenumber,
                    complete: function(params) {
                        alert(JSON.stringify(params));
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>
