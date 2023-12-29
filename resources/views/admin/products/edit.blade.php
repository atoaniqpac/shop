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
        'name' => $product->name,
    ],
]">

    @livewire('admin.products.product-edit', compact('product'))
    
</x-admin-layout>