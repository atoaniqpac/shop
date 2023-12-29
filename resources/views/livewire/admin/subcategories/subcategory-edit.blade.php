<x-form-base>
    <x-validation-errors class="mb-4" />
    <form wire:submit="update">

        <div class="py-2">
            <x-label value="{{ __('Families') }}" />
            <x-select class="block mt-1 w-full" wire:model.live="subcategoryEdit.family_id">
                <option value="" disabled>{{ __('Select a family') }}</option>
                @foreach ($families as $family)
                    <option value="{{ $family->id }}" @selected(old('family_id') == $family->id)>{{ $family->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="py-2">
            <x-label value="{{ __('Categories') }}" />
            <x-select class="block mt-1 w-full" wire:model.live="subcategoryEdit.category_id">
                <option value="" disabled>{{ __('Select a category') }}</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="py-2">
            <x-label for="name" value="{{ __('Subcategory name') }}"/>
            <x-input class="block mt-1 w-full" type="text" name="name" wire:model="subcategoryEdit.name"/>
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
    <form action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" id="delete-form">
        @csrf @method('DELETE')
    </form>
</x-form-base>
