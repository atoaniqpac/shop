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
        'name' => $family->name,
    ],
]">
    <x-form-base>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.families.update', $family) }}">
            @csrf @method('PUT')

            <div>
                <x-label for="name" value="{{ __('Family name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $family->name)" required
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
        <form action="{{ route('admin.families.destroy', $family) }}" method="POST" id="delete-form">
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
