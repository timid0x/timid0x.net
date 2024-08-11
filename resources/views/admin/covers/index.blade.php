<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    ['name' => 'Portadas'],
]">

    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.covers.create') }}">
            Nuevo
        </a>
    </x-slot>

    <ul class="space-y-4" id="covers">
        @foreach ($covers as $cover)
            <li data-id="{{ $cover->id }}" class="bg-white shadow-lg rounded-lg overflow-hidden lg:flex cursor-move">

                <img src="{{ $cover->image }}" alt="" class="h-auto lg:w-64 object-cover">

                <div class="p-4 lg:flex-1 lg:flex lg:justify-between lg:items-center space-y-2 lg:space-y-0">
                    <div>
                        <h1 class="text-2xl font-semibold">
                            {{ $cover->title }}
                        </h1>
                        <p>
                            @if ($cover->is_active)
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    Activo
                                </span>
                            @else
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                    Inactivo
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-bold">
                            Fecha de Inicio
                        </p>
                        <p>
                            {{ $cover->start_at->format('d/m/Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-bold">
                            Fecha de Final
                        </p>
                        <p>
                            {{ $cover->end_at ? $cover->end_at->format('d/m/Y') : '-' }}
                        </p>
                    </div>

                    <div>
                        <a class="btn btn-blue" href="{{ route('admin.covers.edit', $cover) }}">
                            Editar
                        </a>
                    </div>

                </div>

            </li>
        @endforeach
    </ul>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
        <script>
            new Sortable(covers, {
                animation: 150,
                ghostClass: 'bg-orange-100',
                store: {
                    set: (sortable) => {
                        const sorts = sortable.toArray();
                        axios.post("{{ route('api.sort.covers') }}", {
                            sorts: sorts
                        }).catch((error) => {
                            console.log(error);
                        });

                    }
                }
            });
        </script>
    @endpush
</x-admin-layout>
