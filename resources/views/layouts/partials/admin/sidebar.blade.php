@php
    $links = [
        [
            'icon' => 'fa-solid fa-chart-line',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard')
        ],
        [
            //Familias de los productos
            'icon' => 'fa-regular fa-address-book',
            'name' => 'Families',
            'route' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*')
        ],
        [
            //Categorias de los productos
            'icon' => 'fa-solid fa-tag',
            'name' => 'Categories',
            'route' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*')
        ],
        [
            //Subcategorias de los productos
            'icon' => 'fa-solid fa-tags',
            'name' => 'Subcategories',
            'route' => route('admin.subcategories.index'),
            'active' => request()->routeIs('admin.subcategories.*')
        ],
        [
            //Productos
            'icon' => 'fa-brands fa-product-hunt',
            'name' => 'Products',
            'route' => route('admin.products.index'),
            'active' => request()->routeIs('admin.products.*')
        ]

];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-gray-100 border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{'translate-x-0 ease-out': sidebarOpen, '-translate-x-full ease-in': !sidebarOpen}"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-300 dark:bg-gray-700' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center">
                            <i class="{{ $link['icon'] }} text-black dark:text-white"></i>
                        </span>
                        <span class="ms-3 ml-2">{{ __($link['name']) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
