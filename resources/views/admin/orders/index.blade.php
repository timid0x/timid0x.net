<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Ordenes',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ordenes',
    ],
]">

@livewire('admin.orders.order-table')

</x-admin-layout>