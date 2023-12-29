<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categories',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'New category',
    ],
]">
    <x-form-base>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            
                <div class="py-4">
                    <x-label for="family_id" value="{{ __('Family') }}" />
                    <x-select name="family_id" id="family_id" class="block mt-1 w-full" :value="old('family_id')">
                        <option value="">{{ __('Select a family') }}</option>
                        @foreach ($families as $family)
                            <option value="{{ $family->id }}" @selected(old('family_id') == $family->id)>{{ $family->name }}</option>
                        @endforeach
                    </x-select>
                </div>
    
                <div>
                    <x-label for="name" value="{{ __('Category name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                </div>
    
                <div class="flex items-center justify-center mt-4">
                    <button class="btn-success">
                        {{ __('Save') }}
                    </button>
                </div>
    
        </form>
    </x-form-base>
</x-admin-layout>
