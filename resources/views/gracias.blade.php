<x-app-layout>
    <div class="max-w-lg mx-auto pt-2">
        <img class="" src="https://ik.imagekit.io/timid0x/pexels-gabby-k-5957128.jpg?updatedAt=1717872604477"
            alt="">
    </div>
    @if (session('niubiz'))
        @php
            $response = session('niubiz')['response'];

        @endphp

        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Transaccion exitosa</p>
            <p class="text-sm">{{ $response['dataMap']['ACTION_DESCRIPTION']  }}</p>
            <p class="text-sm">
                <b>Número de pedido:</b> 
                {{ $response['order']['purchaseNumber']  }} 
            </p>
            <p>
                <b>Fecha/hora de pedido:</b>
                {{ now()->createFromFormat('ymdHis', $response['dataMap']['TRANSACTION_DATE'])->format('d/m/Y H:i:s') }}
            </p>

            <p>
                <b>Tarjeta:</b>
                {{ $response['dataMap']['CARD'] }} ({{ $response['dataMap']['BRAND'] }})
            </p>

            <p>
                <b>Total:</b>                  
                {{ $response['order']['amount'] }} - USD
            </p>

        </div>
    @endif
</x-app-layout>
