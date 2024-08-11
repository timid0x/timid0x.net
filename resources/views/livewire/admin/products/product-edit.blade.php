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
                src="{{ $image ? $image->temporaryUrl() : Storage::url($productEdit['image_path']) }}" alt="">
        </figure>

        <x-validation-errors class="mb-4" />

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Código
                </x-label>
                <x-input wire:model="productEdit.sku" class="w-full" placeholder="Por favor ingresa el Código" />

            </div>



            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input wire:model="productEdit.name" class="w-full" placeholder="Por favor ingresa el Nombre" />

            </div>


            <div class="mb-4">
                <x-label class="mb-1">
                    Descripción
                </x-label>
                <x-textarea wire:model="productEdit.description" class="w-full"
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

                <x-select class="w-full" wire:model.live="productEdit.subcategory_id">
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
                <x-input type="number" step="0.01" wire:model="productEdit.price" class="w-full"
                    placeholder="Por favor ingresa el precio">
                </x-input>

            </div>
            @empty($product->variants->count() > 0)
                <div class="mb-4">
                    <x-label class="mb-1">
                        Stock
                    </x-label>
                    <x-input type="number" wire:model="productEdit.stock" class="w-full"
                        placeholder="Por favor ingresa cantidad del producto">
                    </x-input>

                </div>
            @endempty





            <div class="flex justify-end">

                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>
        </div>
    </form>

    <div class="card mt-4">

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form action="{{ url('products/' . $product->id . '/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="formFileMultiple" class="mb-2 inline-block text-neutral-500 dark:text-neutral-400">Multiple
                Upload Images (Max:20 images only)</label>
            <input
                class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white  file:dark:text-white"
                type="file" name="images[]" multiple />

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Upload" />
            </div>
        </form>
    </div>


    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')

    </form>

    @push('js')
        <script>
            function confirmDelete() {
                //document.getElementById('delete-form').submit();

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
                        // Swal.fire({
                        //     title: "Eliminado!",
                        //     text: "Se ha eliminado",
                        //     icon: "success"
                        // });
                        document.getElementById('delete-form').submit();
                    }
                });

            }
        </script>
    @endpush

</div>
