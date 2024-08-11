<div>
    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">
        <div class=" lg:col-span-5">
            <div class="flex justify-between mb-2">
                <h1 class="text-lg font-semibold">
                    Carrito de compras ({{ Cart::count() }} productos)
                </h1>
                <button class="btn btn-red font-semibold text-white"
                wire:click="destroy()">
                    Limpiar
                </button>
            </div>

            <div class="card">
                <ul class="space-y-4">
                    @forelse (Cart::content() as $item)
                        <li class="lg:flex">
                            <img class="w-full lg:w-36 aspect-square object-cover object-center mr-2"
                                src="{{ $item->options->image }}" alt="">

                            <div class="w-80">
                                <p class="text-sm">
                                    <a href="{{ route('products.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </p>
                                <button class="bg-red-400 hover:bg-red-600 text-white rounded text-xs px-2.5 py-0.5"
                                wire:click="remove('{{ $item->rowId }}')">
                                    <i class="fas fa-trash"></i>
                                    Quitar
                                </button>
                            </div>
                            <p>
                                B/. {{ $item->price }}
                            </p>
                            <div class="ml-auto space-x-3">

                                <button class="btn btn-gray"
                                wire:click="decrease('{{ $item->rowId }}')">
                                    -
                                </button>
                                <span class="inline-block w-2 text-center">
                                    {{ $item->qty }}
                                </span>
                                <button class="btn btn-gray"
                                wire:click="increase('{{ $item->rowId }}')">
                                    +
                                </button>
                            </div>
                        </li>
                    @empty
                        <p class="text-center">
                            No hay productos
                        </p>
                    @endforelse
                </ul>
            </div>

        </div>

        <div class="lg:col-span-2">
            <div class="card">
                <div class="flex justify-between font-semibold mb-2">
                    <p>
                        Total
                    </p>
                    <p>
                        B/. {{ Cart::subtotal() }}
                    </p>
                </div>
                <a href="{{ route('shipping.index') }}" class="btn btn-green block w-full text-center">
                    Continuar compra
                </a>

            </div>
        </div>

    </div>
</div>
