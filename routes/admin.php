<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('familias', FamilyController::class)->parameters(['familias' => 'family'])->names('families');

Route::resource('categorias', CategoryController::class)->parameters(['categorias' => 'category'])->names('categories');

Route::resource('subcategorias', SubcategoryController::class)->parameters(['subcategorias' => 'subcategory'])->names('subcategories');

Route::resource('productos', ProductController::class)->parameters(['productos' => 'product'])->names('products');