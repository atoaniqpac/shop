<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategories',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'New subcategory',
    ],
]">

    @livewire('admin.subcategories.subcategory-create')

    {{-- <x-form-base>
        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('admin.subcategories.store') }}">
            @csrf
            
                <div class="py-4">
                    <x-label for="category_id" value="{{ __('Category') }}" />
                    <x-select name="category_id" id="category_id" class="block mt-1 w-full" :value="old('category_id')">
                        <option value="">{{ __('Select a category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                </div>
    
                <div>
                    <x-label for="name" value="{{ __('Subcategory name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                </div>
    
                <div class="flex items-center justify-center mt-4">
                    <button class="btn-success">
                        {{ __('Save') }}
                    </button>
                </div>
    
        </form>
    </x-form-base> --}}
    
</x-admin-layout>
