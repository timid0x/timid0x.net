<div class="flex flex-col space-y-2">
    @switch($order->status)
        @case(\App\Enums\OrderStatus::Pending)
            <button class="undeline text-sm text-blue-600 hover:text-gray-900 rounded-md ">
                Listo para despachar
            </button>
        @break

        @case(\App\Enums\OrderStatus::Processing)
            <button class="undeline text-sm text-blue-600 hover:text-gray-900 rounded-md ">
                Asignar repartidor
            </button>
        @break

        @default
    @endswitch
    <button class="undeline text-sm text-blue-600 hover:text-gray-900 rounded-md ">
        Cancelar
    </button>
</div>
