<div>
    <section class="bg-white rounded-lg shadow-lg overflow-hidden">

        <header class="bg-gray-900 px-4 py-2">
            <h2 class="text-lg font-semibold text-white">
                Direcciones de envío guardadas
            </h2>
        </header>

        <div class="p-4">

            @if ($newAddress)
                <x-validation-errors class="mb-4" />
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1">
                        {{-- tipo --}}
                        <x-select wire:model="createAddress.type">
                            <option value="" disabled selected>
                                Tipo de dirección
                            </option>
                            <option value="1">
                                Domicilio
                            </option>
                            <option value="2">
                                Oficina
                            </option>
                        </x-select>
                    </div>
                    {{-- descripcion --}}
                    <div class="col-span-3">

                        <x-input type="text" class="w-full" placeholder="Ingresa dirección"
                            wire:model="createAddress.description">
                        </x-input>
                    </div>

                    {{-- distrito --}}
                    <div class="col-span-2">
                        <x-input type="text" class="w-full" placeholder="Ingresa provincia"
                            wire:model="createAddress.district">
                        </x-input>
                    </div>
                    {{-- referencia --}}
                    <div class="col-span-2">
                        <x-input type="text" class="w-full" placeholder="Ingresa referencia"
                            wire:model="createAddress.reference">
                        </x-input>
                    </div>


                </div>


                <hr class="my-4">
                <div x-data="{
                    receiver: @entangle('createAddress.receiver'),
                    receiver_info: @entangle('createAddress.receiver_info'),
                }" x-init="$watch('receiver', value => {
                    if (value == 1) {
                        receiver_info.first_name = '{{ auth()->user()->first_name }}';
                        receiver_info.last_name = '{{ auth()->user()->last_name }}';
                        receiver_info.document_type = '{{ auth()->user()->document_type }}';
                        receiver_info.document_number = '{{ auth()->user()->document_number }}';
                        receiver_info.phone = '{{ auth()->user()->phone }}';
                    } else {
                        receiver_info.first_name = '';
                        receiver_info.last_name = '';
                        receiver_info.document_number = '';
                        receiver_info.phone = '';
                    }
                })">
                    <p>
                        ¿Quién recibe?
                    </p>
                    <div class="flex space-x-4 mb-4">
                        <label class="flex items-center">
                            <input x-model="receiver" class="mr-1" type="radio" name="receiver" value="1">
                            Seré yo
                        </label>
                        <label class="flex items-center">
                            <input x-model="receiver" class="mr-1" type="radio" name="receiver" value="2">
                            Otra persona
                        </label>
                    </div>


                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <x-input x-bind:disabled="receiver == 1" x-model="receiver_info.first_name" type="text"
                                class="w-full" placeholder="Ingresa nombre">
                            </x-input>
                        </div>

                        <div>
                            <x-input x-bind:disabled="receiver == 1" x-model="receiver_info.last_name" type="text"
                                class="w-full" placeholder="Ingresa apellido">
                            </x-input>
                        </div>

                        <div>
                            <div class="flex space-x-2">
                                <x-select x-model="receiver_info.document_type">
                                    <option value="" disabled selected>Escoger documento</option>
                                    <option value="1">Cédula</option>
                                    <option value="2">Pasaporte</option>
                                </x-select>

                                <x-input x-model="receiver_info.document_number" type="text" class="w-full"
                                    placeholder="Ingresa documento">
                                </x-input>


                            </div>
                        </div>

                        <div>
                            <x-input x-model="receiver_info.phone" type="text" class="w-full"
                                placeholder="Ingresa teléfono">
                            </x-input>
                        </div>

                        <div>
                            <button class="btn btn-outline-gray w-full" wire:click="$set('newAddress',false)">
                                Cancelar
                            </button>
                        </div>


                        <div>
                            <button wire:click="store" class="btn btn-blue w-full">
                                Guardar
                            </button>
                        </div>







                    </div>


                </div>
            @else
                @if ($addresses->count())

                    <ul class="grid grid-cols-3 gap-4">

                        @foreach ($addresses as $address)
                            <li class="{{ $address->default ? 'bg-lime-200' : 'bg-white' }} shadow-lg rounded-lg overflow-hidden "
                                wire:key="addresses-{{ $address->id }}">
                                <div class="p-4 flex items-center">
                                    <div>
                                        <i class="fa-solid fa-location-dot text-2xl text-gray-800"></i>
                                    </div>

                                    <div class="flex-1 mx-4 text-xs">
                                        <p class="text-gray-800">
                                            {{ $address->type == 1 ? 'Casa' : 'Oficina' }}
                                        </p>
                                        <p class="text-gray-800 font-semibold">
                                            {{ $address->district }}
                                        </p>
                                        <p class="text-gray-800 font-semibold">
                                            {{ $address->description }}
                                        </p>
                                        <p class="text-gray-800 font-semibold">
                                            {{ $address->receiver_info['first_name'] . ' ' . $address->receiver_info['last_name'] }}

                                        </p>
                                    </div>

                                    <div class="text-xs  text-gray-800 flex flex-col">
                                        <button wire:click="setDefaultAddress({{ $address->id }})">
                                            <i class="fa-solid fa-star"></i>
                                        </button>
                                        <button>
                                            <i class="fa-solid fa-pencil "></i>
                                        </button>
                                        <button wire:click="deleteAddress({{ $address->id }})">
                                            <i class="fa-solid fa-trash-can "></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                @else
                    <p class="text-center">
                        No hay direcciones de envío guardadas
                    </p>
                @endif
            @endif



            <button class="btn btn-outline-gray w-full flex justify-center items-center mt-4"
                wire:click="$set('newAddress',true)">
                Agregar <i class="fas fa-plus ml-2"></i>
            </button>

        </div>

    </section>
</div>
