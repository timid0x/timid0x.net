<div>
    <form wire:submit="addFeature" class="flex space-x-4">
        {{-- valores --}}
        <div class="flex-1">
            <x-label class="mb-1">
                Valor
            </x-label>


            @switch($option->type)
                @case(1)
                    <x-input wire:model="newFeature.value" class="w-full" placeholder="Ingresa valor">
                    </x-input>
                @break

                @case(2)
                    <div class="border border-gray-300 rounded-md h-[42px] flex items-center justify-between px-2">
                        {{ $newFeature['value'] ?: 'Seleccione color' }}
                        <input type="color" wire:model.live="newFeature.value">
                    </div>
                @break

                @default
            @endswitch
        </div>
        {{-- desc --}}
        <div class="flex-1">
            <x-label class="mb-1">
                Descripción
            </x-label>
            <x-input wire:model="newFeature.description" class="w-full" placeholder="Ingresa descripción">
            </x-input>
        </div>
        {{-- orden --}}
        <div class="flex-1">
            <x-label class="mb-1">
                Orden
            </x-label>
            <x-input wire:model="newFeature.order" class="w-full" placeholder="Ingresa orden">
            </x-input>
        </div>
        {{-- button --}}
        <div class="p-4">
            <x-button>
                Agregar
            </x-button>
        </div>

    </form>
</div>
