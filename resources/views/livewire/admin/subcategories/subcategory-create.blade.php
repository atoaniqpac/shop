<x-form-base>
    <x-validation-errors class="mb-4" />
    <form wire:submit="save">

        <div class="py-2">
            <x-label value="{{ __('Families') }}" />
            <x-select class="block mt-1 w-full" wire:model.live="subcategory.family_id">
                <option value="" disabled>{{ __('Select a family') }}</option>
                @foreach ($families as $family)
                    <option value="{{ $family->id }}" @selected(old('family_id') == $family->id)>{{ $family->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="py-2">
            <x-label value="{{ __('Categories') }}" />
            <x-select class="block mt-1 w-full" wire:model.live="subcategory.category_id">
                <option value="" disabled>{{ __('Select a category') }}</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="py-2">
            <x-label for="name" value="{{ __('Subcategory name') }}"/>
            <x-input class="block mt-1 w-full" type="text" name="name" wire:model="subcategory.name"/>
        </div>

        <div class="flex items-center justify-center mt-4">
            <button class="btn-success">
                {{ __('Save') }}
            </button>
        </div>

    </form>
</x-form-base>
