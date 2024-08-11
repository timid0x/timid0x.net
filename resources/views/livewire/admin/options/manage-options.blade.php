<div>
    <section class="rounded-lg bg-white shadow-lg">

        <header class="border-b border-gray-300 px-6 py-2">
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold text-gray-700">
                    Opciones
                </h1>
                <x-button wire:click="$set('newOption.openModal', true)">
                    Nuevo
                </x-button>
            </div>
        </header>

        <div class="p-4">

            <div class="space-y-4">
                @foreach ($options as $option)
                    <div class="p-6 rounded-lg border border-gray-200 relative" 
                    wire:key="option-{{ $option->id }}">
                        <div class="bg-white">
                            <button class="ml-1"
                            onclick="confirmDelete({{ $option->id }},'option')">
                                <i class="fa-solid fa-trash-can text-red-500 hover:text-red-800"></i>
                            </button>

                            <span>
                                {{ $option->name }}
                            </span>
                        </div>
                        {{-- Valores --}}
                        <div class="flex flex-wrap p-2 mb-4">
                            @foreach ($option->features as $feature)
                                @switch($option->type)
                                    @case(1)
                                        {{-- //texto --}}
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            {{ $feature->description }}
                                            <button class="ml-1" onclick="confirmDelete({{ $feature->id }},'feature')">
                                                <i class="fa-solid fa-xmark hover:text-red-500">x</i>
                                            </button>

                                        </span>
                                    @break

                                    @case(2)
                                        {{-- //color --}}
                                        <div class="relative">
                                            <span
                                                class="inline-block h-6 w-6 shadow-lg rounded-full border-2 border-gray-400 mx-1"
                                                style="background-color: {{ $feature->value }}"></span>
                                            <button
                                                class="absolute z-10 left-5 top-2 rounded-full bg-red-500 hover:bg-red-800 h-4 w-4 flex justify-center items-center"
                                                onclick="confirmDelete({{ $feature->id }},'feature')">
                                                <i class="fa-solid fa-xmark hover:text-red-500 text-sm text-white"></i>
                                            </button>
                                        </div>
                                    @break

                                    @default
                                @endswitch
                            @endforeach
                        </div>

                        {{-- Acciones --}}
                        <div>
                            @livewire('admin.options.add-new-feature', ['option' => $option], key('add-newfeature-' . $option->id))
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </section>

    <x-dialog-modal wire:model="newOption.openModal">
        <x-slot name="title">
            Crear nueva opción
        </x-slot>
        <x-slot name="content">
            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-label class="mb-1">
                        Nombre
                    </x-label>
                    <x-input wire:model="newOption.name" class="w-full" placeholder="Ingresa datos">
                    </x-input>
                </div>
                <div>
                    <x-label class="mb-1">
                        Tipo
                    </x-label>
                    <x-select wire:model.live="newOption.type" class="w-full">
                        <option value="1">Texto</option>
                        <option value="2">Color</option>
                    </x-select>
                </div>
            </div>


            <div class="flex items-center mb-4">
                <hr class="flex-1">
                <span class="mx-4">
                    Valores
                </span>
                <hr class="flex-1">
            </div>

            <div class="mb-4 space-y-2">
                @foreach ($newOption->features as $index => $feature)
                    <div wire:key="feature-{{ $index }}" class="p-6 rounded-lg border border-gray-200">

                        <div class="p-2 bg-white">
                            <button wire:click="removeFeature({{ $index }})">
                                <i class="fa-solid fa-trash-can text-red-500 hover:text-red-900"></i>
                            </button>
                        </div>

                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <x-label class="mb-1">
                                    Valor
                                </x-label>


                                @switch($newOption->type)
                                    @case(1)
                                        <x-input wire:model="newOption.features.{{ $index }}.value" class="w-full"
                                            placeholder="Ingresa valor">
                                        </x-input>
                                    @break

                                    @case(2)
                                        <div
                                            class="border border-gray-300 rounded-md h-[42px] flex items-center justify-between px-2">
                                            {{ $newOption->features[$index]['value'] ?: 'Seleccione color' }}
                                            <input type="color"
                                                wire:model.live="newOption.features.{{ $index }}.value">
                                        </div>
                                    @break

                                    @default
                                @endswitch

                            </div>
                            <div>
                                <x-label class="mb-1">
                                    Descripción
                                </x-label>
                                <x-input wire:model="newOption.features.{{ $index }}.description" class="w-full"
                                    placeholder="Ingresa descripción">
                                </x-input>
                            </div>
                            <div>
                                <x-label class="mb-1">
                                    Orden
                                </x-label>
                                <x-input wire:model="newOption.features.{{ $index }}.order" class="w-full"
                                    placeholder="Ingresa orden">
                                </x-input>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <x-button wire:click="addFeature" class="me-2">
                    Agregar valor
                </x-button>
            </div>

        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-blue" wire:click="addOption">
                Agregar
            </button>
        </x-slot>
    </x-dialog-modal>

    @push('js')
        <script>
            function confirmDelete(id,type) {
                Swal.fire({
                    title: "¿Estas seguro?",
                    text: "No se puede revertir",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, bórralo",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        switch (type) {
                            case 'feature':
                                @this.call('deleteFeature', id);
                                break;
                            case 'option':
                                @this.call('deleteOption', id);
                                break;
                        }
                       
                    }
                });
            }
        </script>
    @endpush
</div>
