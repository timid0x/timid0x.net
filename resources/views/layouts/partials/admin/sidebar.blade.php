@php
    $links = [
        //Dashboard
        [
            'icon' => 'fa-solid fa-gauge',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeis('admin.dashboard'),
        ],
        [
            'header' => 'Administrar página',
        ],

        [
            //Opciones
            'icon' => 'fa-solid fa-cog',
            'name' => 'Opciones',
            'route' => route('admin.options.index'),
            'active' => request()->routeis('admin.opcions.*'),
        ],

        [
            //Familia de productos
            'icon' => 'fa-solid fa-box-open',
            'name' => 'Familias',
            'route' => route('admin.families.index'),
            'active' => request()->routeis('admin.families.*'),
        ],

        [
            //Categorias de productos
            'icon' => 'fa-solid fa-tags',
            'name' => 'Categorias',
            'route' => route('admin.categories.index'),
            'active' => request()->routeis('admin.categories.*'),
        ],

        [
            //SubCategorias de productos
            'icon' => 'fa-solid fa-tag',
            'name' => 'Subcategorias',
            'route' => route('admin.subcategories.index'),
            'active' => request()->routeis('admin.subcategories.*'),
        ],

        [
            //Productos
            'icon' => 'fa-solid fa-box',
            'name' => 'Productos',
            'route' => route('admin.products.index'),
            'active' => request()->routeis('admin.products.*'),
        ],
        [
            //Portadas
            'icon' => 'fa-solid fa-images',
            'name' => 'Portadas',
            'route' => route('admin.covers.index'),
            'active' => request()->routeis('admin.covers.*'),
        ],
        [
            'header' => 'Ordenes y envíos',
        ],
        [
            //Orders
            'icon' => 'fa-solid fa-shopping-cart',
            'name' => 'Ordenes',
            'route' => route('admin.orders.index'),
            'active' => request()->routeis('admin.orders.*'),
        ],
        [
            'header' => 'Usuarios',
        ],
        [
            //Users
            'icon' => 'fa-solid fa-users',
            'name' => 'Usuarios',
            'route' => route('admin.users.show'),
            'active' => request()->routeis('admin.users.*'),
        ],
    ];

@endphp


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-3 py-2 text-xs font-semibold text-gray-600 uppercase">
                            {{ $link['header'] }}
                        </div>
                    @else
                        <a href="{{ $link['route'] }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">
                            <span class="inline-flex w-6 h-6 justify-center items-center">
                                <i class="{{ $link['icon'] }} text-gray-500"></i>
                            </span>
                            <span class="ml-2">{{ $link['name'] }}</span>
                        </a>
                    @endisset
                </li>
            @endforeach

        </ul>
    </div>
</aside>
