<div>

    <x-form-base>
        <form wire:submit="store">
            <div class="mb-4">
                <figure class="relative">
                    <div class="absolute top-1 right-2">
                        <label class="flex items-center  btn-primary">
                            <i class="fa-solid fa-camera"></i>
                            <span class="pl-2">{{ __('Update image') }}</span>
                            <input type="file" class="hidden" accept="image/*" wire:model='image'>
                        </label>
                    </div>
                    <img src="{{ $image ? $image->temporaryUrl() : asset('img/img.png') }}" alt="no image"
                        class="w-full aspect-[16/9] object-cover object-center">
                </figure>
            </div>


            <x-validation-errors class="mb-4" />

            <div class="py-2">
                <x-label for="code" value="{{ __('Code') }}" />
                <x-input class="block mt-1 w-full" type="text" name="code" wire:model="product.sku" />
            </div>

            <div class="py-2">
                <x-label for="name" value="{{ __('Product name') }}" />
                <x-input class="block mt-1 w-full" type="text" name="name" wire:model="product.name" />
            </div>

            <div class="py-2">
                <x-label for="description" value="{{ __('Product description') }}" />
                <x-textarea class="block mt-1 w-full" name="description" wire:model="product.description" />
            </div>

            <div class="py-2">
                <x-label for="price" value="{{ __('Product price') }}" />
                <x-input class="block mt-1 w-full" type="number" step="0.01" name="price" wire:model="product.price" />
            </div>

            <div class="py-2">
                <x-label value="{{ __('Families') }}" />
                <x-select class="block mt-1 w-full" wire:model.live="family_id">
                    <option value="" disabled>{{ __('Select a family') }}</option>
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}" @selected(old('family_id') == $family->id)>{{ $family->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="py-2">
                <x-label value="{{ __('Categories') }}" />
                <x-select class="block mt-1 w-full" wire:model.live="category_id">
                    <option value="" disabled>{{ __('Select a category') }}</option>
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="py-2">
                <x-label value="{{ __('Subcategories') }}" />
                <x-select class="block mt-1 w-full" wire:model="product.subcategory_id">
                    <option value="" disabled>{{ __('Select a subcategory') }}</option>
                    @foreach ($this->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" @selected(old('subcategory_id') == $subcategory->id)>{{ $subcategory->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="flex items-center justify-center mt-4">
                <button class="btn-success">
                    {{ __('Save') }}
                </button>
            </div>

        </form>
    </x-form-base>
</div>
