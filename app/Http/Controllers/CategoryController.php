<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ], [
            'name.required' => 'Nama category wajib diisi.',
            'name.unique' => 'Nama category sudah ada.',
        ]);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $category->id],
        ], [
            'name.required' => 'Nama category wajib diisi.',
            'name.unique' => 'Nama category sudah ada.',
        ]);

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Category berhasil diperbarui.');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category berhasil dihapus.');
    }
}
