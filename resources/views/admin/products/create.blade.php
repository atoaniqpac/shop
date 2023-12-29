<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Products',
        'route' => route('admin.products.index'),
    ],
    [
        'name' => 'New product',
    ],
]">

    @livewire('admin.products.product-create')
    
</x-admin-layout>