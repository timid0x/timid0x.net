<x-app-layout>
    <x-container class="mt-12 px-4">

        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-2">
                @livewire('shipping-addresses')
            </div>

            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow overflow-hidden ">
                    <div class="bg-blue-200 text-gray-800 p-4">
                        <p class="font-semibold">
                            Resumen de compra ({{ Cart::instance('shopping')->count() }})
                        </p>
                        <a href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>

                    <div class="p-4 text-gray-800">
                        <ul>
                            @foreach (Cart::content() as $item)
                                <li class="flex items-center space-x-4 mb-2">
                                    <figure class="shrink-0">
                                        <img class="h-12 w-12 aspect-square object-cover"
                                            src="{{ $item->options->image }}" alt="">
                                    </figure>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold">
                                            {{ $item->name }}
                                        </p>
                                        <p>
                                            $ {{ $item->price }}
                                        </p>

                                    </div>
                                    <div class="shrink-0">
                                        <p class="font-semibold">
                                            {{ $item->qty }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <hr class="my-4">

                        <div class="flex justify-between">
                            <p class="text-lg font-bold">
                                Total
                            </p>
                            <p class="text-lg font-bold">
                                $ {{ Cart::subtotal() }}
                            </p>
                        </div>


                    </div>


                </div>


                <a href="{{ route('checkout.index') }}" class="btn btn-blue block w-full text-center mt-4">
                    Siguiente
                </a>

            </div>

        </div>

    </x-container>
</x-app-layout>
