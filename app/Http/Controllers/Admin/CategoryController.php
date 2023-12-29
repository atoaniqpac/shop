<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->with('family')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = Family::all();
        return view('admin.categories.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'family_id' => 'required|exists:families,id',
            'name' => 'required|unique:categories|min:5|max:255',
        ]);

        Category::create($request->all());

        session()->flash('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Categoria creada correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $families = Family::all();
        return view('admin.categories.edit', compact('category', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:5|max:255|unique:categories,name,' . $category->id,
            'family_id' => 'required',
        ]);

        Category::create($request->all());

        session()->flash('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Categoria creada correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]);

        return redirect()->route('admin.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->subcategory()->count() > 0) {
            session()->flash('swal', [
                'title' => '!Ups!',
                'text' => 'La categoria no se puede eliminar porque tiene subcategorias asociadas',
                'icon' => 'error',
                'customClass' => [
                    'title' => 'text-black',
                    'confirmButton' => 'btn-primary',
                ]
            ]);
            return redirect()->route('admin.categories.index');
        }

        $category->delete();

        session()->flash('swal', [
            'title' => '!Bien hecho!',
            'text' => 'Categoria eliminada correctamente',
            'icon' => 'success',
            'customClass' => [
                'title' => 'text-black',
                'confirmButton' => 'btn-primary',
            ]
        ]);

        return redirect()->route('admin.categories.index');
    }
}
