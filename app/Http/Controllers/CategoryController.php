<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Category.category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('Category.category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $category = Category::create($request->all());
        return redirect('kategori')->with('status', 'Kategori berhasil ditambahkan');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Category.category-edit', ['category' => $category]);
    }

    public function update (Request $request, $slug)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('kategori')->with('status', 'Kategori berhasil diupdate');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category -> delete();
        return redirect('kategori')->with('status', 'Kategori berhasil dihapus');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('Category.category-deleted', ['deletedCategories' => $deletedCategories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('kategori')->with('status', 'Kategori berhasil dipulihkan');
    }
}
