<x-container class="px-4 my-4">
    <div class="grid md:grid-cols-2 gap-6">
        <div class="col-span-1">
            <figure class="mb-2">
                <img src="{{ $this->variant->image }}" alt="{{ $product->name }}"
                    class="w-full aspect-auto object-cover object-center" />
            </figure>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                </div>
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


            <div class="mt-4 flex flex-wrap">
                @foreach ($product->options as $option)
                    <div class="mr-4 mb-4">
                        <p class="font-semibold text-lg mb-2">
                            {{ $option->name }}
                        </p>
                        <ul class="flex space-x-2 items-center">
                            @foreach ($option->pivot->features as $feature)
                                <li>
                                    @switch($option->type)
                                        @case(1)
                                            <button
                                                class="w-20 h-8 font-semibold uppercase text-sm rounded-lg {{ $selectedFeatures[$option->id] == $feature['id'] ? 'bg-blue-600 text-white' : '' }} border border-gray-300 text-gray-800"
                                                wire:click="$set('selectedFeatures.{{ $option->id }}', {{ $feature['id'] }})">
                                                {{ $feature['value'] }}
                                            </button>
                                        @break

                                        @case(2)
                                            <div
                                                class="p-0.5 border-2 rounded-lg flex items-center -mt-1 {{ $selectedFeatures[$option->id] == $feature['id'] ? 'border-blue-600' : 'border-transparent' }}">
                                                <button class="w-20 h-8 rounded-lg  border border-gray-300 text-gray-800"
                                                    style="background-color: {{ $feature['value'] }};"
                                                    wire:click="$set('selectedFeatures.{{ $option->id }}', {{ $feature['id'] }})">
                                                </button>
                                            </div>
                                        @break

                                        @default
                                    @endswitch



                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
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
