<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;
    
    public $product;
    public $productEdit;


    public $families;
    public $family_id = '';
    public $category_id = '';
    public $image;

    

    public function mount($product)
    {
        $this->productEdit = $product->only('sku', 'name', 'description', 'image_path', 'price', 'subcategory_id');

        $this->families = Family::all();

        $this->category_id = $product->subcategory->category_id;

        $this->family_id = $product->subcategory->category->family_id;

        //dd($this->productEdit);
    }

    public function boot()
    {
        $this->withValidator(function ($validator) {

            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'title' => 'Error',
                    'text' => 'El formulario contiene errores',
                    'icon' => 'error',
                    'customClass' => [
                        'title' => 'text-black',
                        'confirmButton' => 'btn-primary',
                    ]
                ]);
            }
        });
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->get();
    }

    #[Computed()]
    public function subcategories()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function updatedFamilyId($value)
    {
        $this->category_id = '';
        $this->productEdit['subcategory_id'] = '';
    }

    public function updatedCategoryId($value)
    {
        $this->productEdit['subcategory_id'] = '';
    }

    public function update ()
    {
        $this->validate([
            'image' => 'nullable|image|max:1024',
            'productEdit.sku' => 'required|unique:products,sku,' . $this->product->id,
            'productEdit.name' => 'required|min:3|max:255',
            'productEdit.description' => 'nullable',
            'productEdit.price' => 'required|numeric|min:0',
            'productEdit.subcategory_id' => 'required|exists:subcategories,id',
        ]);

        if ($this->image) {
            Storage::delete($this->productEdit['image_path']);            
            $this->productEdit['image_path'] = $this->image->update('products');
        }

        $this->product->update($this->productEdit);

        /* $this->dispatch('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Producto Actualizado correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]); */

        session()->flash('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Producto Actualizado correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]);

        return redirect()->route('admin.products.edit', $this->product); 
    }

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
