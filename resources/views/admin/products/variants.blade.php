<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => $product->name,
        'route' => route('admin.products.edit', $product),
    ],
    [
        'name' => $variant->features->pluck('description')->implode(','),
        'route' => route('admin.products.edit', $product),
    ],
]">
    <form action="{{ route('admin.products.variantsUpdate', [$product, $variant]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf @method('PUT')

        <x-validation-errors />


        <div class="relative mb-6">
            <figure>
                <img class="aspect-auto object-cover object-center" src="{{ $variant->image }}" alt=""
                    id="imgPreview">
            </figure>
            <div class="absolute top-2 left-2">
                <label class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen
                    <input name="image" type="file" class="hidden" accept="image/*" name="image"
                        onchange="previewImage(event, '#imgPreview')">
                </label>
            </div>
        </div>

        <div class="card">
            <div class="mb-4">
                <x-label>
                    Código SKU
                </x-label>
                <x-input name="sku" value="{{ old('sku', $variant->sku) }}" placeholder="Ingrese el SKU"
                    class="w-full">

                </x-input>
            </div>

            <div class="mb-4">
                <x-label>
                    Stock
                </x-label>
                <x-input name="stock" value="{{ old('stock', $variant->stock) }}" placeholder="Ingrese cantidad"
                    class="w-full">

                </x-input>
            </div>
            <div class="flex justify-end">
                <x-button>
                    Actualizar
                </x-button>
            </div>

        </div>

    </form>



    @push('js')
        <script>
            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                const input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                $imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                file = input.files[0];

                //Creamos la url
                objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                $imgPreview.src = objectURL;

            }
        </script>
    @endpush

</x-admin-layout>
