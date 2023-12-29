<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Families',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => 'New family',
    ],
]">
    <x-form-base>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.families.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Family name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <button class="btn-success">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </x-form-base>
</x-admin-layout>
