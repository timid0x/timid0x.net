@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tobiasroeder/imagebox@1.3.2/dist/imagebox.min.css">
@endpush

<x-container class="px-4 my-4">
    <div class="grid md:grid-cols-2 gap-6">
        <div class="col-span-1">
            <figure class="mb-2">
                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                    class="w-full aspect-auto object-cover object-center" alt="" data-imagebox="" />
            </figure>

            <div class="grid grid-cols-3 gap-4">
                {{-- @dump($product->producto_imagenes()->count()) --}}
                @foreach ($product->producto_imagenes()->get() as $item)
                    {{-- @dump($item) --}}
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $item->image_path) }}"
                            alt="" data-imagebox="">

                    </div>
                @endforeach


            </div>


        </div>

        <div class="col-span-1">
            <h1 class="text-2xl text-gray-700 mb-2">
                {{ $product->name }}
            </h1>


            <div class="flex items-center space-x-2 mb-4">
                <ul class="flex space-x-2 text-sm">
                    <li>
                        <i class="fas fa-star text-yellow-500"></i>
                    </li>
                    <li>
                        <i class="fas fa-star text-yellow-500"></i>
                    </li>
                    <li>
                        <i class="fas fa-star text-yellow-500"></i>
                    </li>
                    <li>
                        <i class="fas fa-star text-yellow-500"></i>
                    </li>
                    <li>
                        <i class="fas fa-star text-yellow-500"></i>
                    </li>
                </ul>
                <p class="text-sm text-gray-600">4.7 -
                    @if ($product->stock > 0)
                        inv: {{ $product->stock }}
                    @else
                        <a href="" class="text-red-500">inv: <i class="fa-solid fa-triangle-exclamation"></i>
                            agotado</a>
                    @endif

                </p>





            </div>

            <p class="font-bold text-3xl text-gray-800 mb-2">
                B/.{{ $product->price }}
            </p>



            <div class="flex items-center space-x-6" x-data="{ qty: @entangle('qty') }">

                <button class="btn btn-gray" x-on:click="qty--" x-bind:disabled="qty == 1">
                    -
                </button>
                <span x-text="qty" class="inline-block w-2 text-center">

                </span>
                <button class="btn btn-gray" x-on:click="qty++">
                    +
                </button>
            </div>

            <button class="btn btn-blue mt-4 w-full" wire:click="add_to_cart" wire:loading.attr="disabled">
                Agregar al carrito
            </button>

            <div class="text-sm mt-4">
                {{ $product->description }}
            </div>
            <div class="flex items-center space-x-4 text-gray-700 mt-4">
                <i class="fa fa-truck-fast text-2xl"></i>
                <p class="text-sm text-gray-600">
                    Despacho a domicilio</p>
            </div>


        </div>

</x-container>
@push('js')
    <script src="https://cdn.jsdelivr.net/gh/tobiasroeder/imagebox@1.3.2/dist/imagebox.min.js"></script>
@endpush

