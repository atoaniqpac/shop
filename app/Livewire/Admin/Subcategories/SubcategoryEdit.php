<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryEdit extends Component
{

    public $subcategory;

    public $families;

    public $subcategoryEdit;

    public function mount($subcategory)
    {
        $this->families = Family::all();

        $this->subcategoryEdit = [
            'family_id' => $subcategory->category->family_id,
            'category_id' => $subcategory->category_id,
            'name' => $subcategory->name
        ];
    }

    public function updatedSubcategoryEditFamilyId()
    {
        $this->subcategoryEdit['category_id'] = '';
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->subcategoryEdit['family_id'])->get();
    }

    public function update()
    {
        $this->validate([
            'subcategoryEdit.family_id' => 'required|exists:families,id',
            'subcategoryEdit.category_id' => 'required|exists:categories,id',
            'subcategoryEdit.name' => 'required|min:5|max:255',
        ]);

        $this->subcategory->update($this->subcategoryEdit);

        /* session()->flash('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Subcategoria actualizada correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]); */

        $this->dispatch('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Subcategoria actualizada correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]);

    }


    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-edit');
    }
}
