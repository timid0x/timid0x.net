<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Portadas',
        'route' => route('admin.covers.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">



    <form action="{{ route('admin.covers.update', $cover) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <figure class="mb-4 relative">
            <div class="absolute top-2 left-2">
                <label class="flex items-center p-2 rounded-lg bg-white cursor-pointer text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen
                    <input type="file" accept="image/*" class="hidden" name="image"
                        onchange="previewImage(event, '#imgPreview')">
                </label>
            </div>
            <img id="imgPreview" class="aspect-auto object-cover" src="{{ $cover->image }}" alt="">
        </figure>

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label>
                Título
            </x-label>
            <x-input name="title" class="w-full" value="{{ old('title', $cover->title) }}"
                placeholder="Ingrese el nombre de la portada" />

        </div>

        <div class="mb-4">
            <x-label>
                Fecha de inicio
            </x-label>
            <x-input type="date" name="start_at" class="w-full"
                value="{{ old('start_at', $cover->start_at->format('Y-m-d')) }}" />

        </div>

        <div class="mb-4">
            <x-label>
                Fecha de final
            </x-label>
            <x-input type="date" name="end_at" class="w-full"
                value="{{ old('end_at', $cover->end_at ? $cover->end_at->format('Y-m-d') : '') }}" />
        </div>

        <div class="mb-4 flex space-x-2">
            <label>
                <x-input type="radio" name="is_active" value="1" :checked="$cover->is_active == 1" />
                Activo
            </label>
            <label>
                <x-input type="radio" name="is_active" value="0" :checked="$cover->is_active == 0" />
                Inactivo
            </label>
        </div>

        <div class="flex justify-end">
            <x-danger-button onclick="confirmDelete()">
                Eliminar
            </x-danger-button>
            <x-button class="ml-2">
                Actualizar
            </x-button>
        </div>

    </form>

    <form action="{{ route('admin.covers.destroy', $cover) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')

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

</x-admin-layout>
