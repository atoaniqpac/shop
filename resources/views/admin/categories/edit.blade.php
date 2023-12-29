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
        'name' => $category->name,
    ],
]">
    <x-form-base>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf @method('PUT')

            <div class="py-4">
                <x-label for="family_id" value="{{ __('Family') }}" />
                <x-select name="family_id" id="family_id" class="block mt-1 w-full" :value="old('family_id')">
                    <option :value="">{{ __('Select a family') }}</option>
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}" @selected(old('family_id', $category->family_id) == $family->id)>{{ $family->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-label for="name" value="{{ __('Category name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" required
                    autofocus autocomplete="name" />
            </div>

            <div class="flex items-center justify-between mt-8 mx-6">

                <button type="button" class="btn-danger" onclick="confirmDelete()">
                    {{ __('Delete') }}
                </button>

                <button class="btn-success">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" id="delete-form">
            @csrf @method('DELETE')
        </form>
        @push('js')
            <script>
                function confirmDelete() {
                    Swal.fire({
                        title: "¿Estas seguro?",
                        text: "!No podrás revertir esta acción!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#4338ca",
                        cancelButtonColor: "#b91c1c",
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Si, eliminar!",
                        customClass: {
                            title: 'text-black',
                            confirmButton: 'btn-danger',
                            cancelButton: 'btn-primary',
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form').submit();
                        }
                    });
                }
            </script>
        @endpush
    </x-form-base>
</x-admin-layout>
