<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categories',
    ],
]">

<x-slot name="action">
    <a href="{{ route('admin.categories.create') }}" class="btn-success">
        {{ __('New category') }}
    </a>
</x-slot>

    @if (count($categories))

    <div class="relative overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-black uppercase bg-gray-300 dark:bg-gray-700 dark:text-white">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        {{ __('Id') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Category') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Family') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($categories as $category)
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 text-black dark:text-white">
                            {{ $category->id }}
                        </td>
                        <td class="px-6 py-4 text-black dark:text-white">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4 text-black dark:text-white">
                            {{ $category->family->name }}
                        </td>
                        <td class="px-6 py-4 text-black dark:text-white">
                            <div class="flex items-center justify-around">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn-circle-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" id="delete-form">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn-circle-danger" onclick="confirmDelete()">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
    @else
        
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
            <span class="font-medium">{{ __('Info alert!') }}</span> {{ __("There are no registered families yet, please register some to view them") }}
            </div>
        </div>

    @endif

</x-admin-layout>
