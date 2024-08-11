<div>

    <form wire:submit="store">

        <figure class="mb-4 relative">
            <div class="absolute top-2 left-2">
                <label class="flex items-center p-2 rounded-lg bg-white cursor-pointer text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen
                    <input type="file" accept="image/*" class="hidden" wire:model="image">
                </label>
            </div>
            <img class="shadow-lg object-cover"
                src="{{ $image ? $image->temporaryUrl() : asset('assets/images/image-notfound.png') }}" alt="">
        </figure>

        <x-validation-errors class="mb-4"/>

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Código
                </x-label>
                <x-input wire:model="product.sku" class="w-full" placeholder="Por favor ingresa el Código" />

            </div>



            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input wire:model="product.name" class="w-full" placeholder="Por favor ingresa el Nombre" />

            </div>


            <div class="mb-4">
                <x-label class="mb-1">
                    Descripción
                </x-label>
                <x-textarea wire:model="product.description" class="w-full"
                    placeholder="Por favor ingresa la descripción">
                </x-textarea>

            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Familias
                </x-label>
                <x-select class="w-full" wire:model.live="family_id">
                    <option value="" disabled>
                        Selecciona una familia
                    </option>
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">
                            {{ $family->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>


            <div class="mb-4">
                <x-label class="mb-1">
                    Categorias
                </x-label>

                <x-select class="w-full" wire:model.live="category_id">
                    <option value="" disabled>
                        Selecciona una Categoría
                    </option>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>


            <div class="mb-4">
                <x-label class="mb-1">
                    Subcategorias
                </x-label>

                <x-select class="w-full" wire:model.live="product.subcategory_id">
                    <option value="" disabled>
                        Selecciona una Subcategoría
                    </option>
                    @foreach ($this->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            
            <div class="mb-4">
                <x-label class="mb-1">
                    Precio
                </x-label>
                <x-input type="number" step="0.01"
                wire:model="product.price" class="w-full" placeholder="Por favor ingresa el precio">
                </x-input>

            </div>


            <div class="flex justify-end">
                <x-button >
                   Crear producto
                </x-button>
            </div>

        </div>

    </form>
</div>
