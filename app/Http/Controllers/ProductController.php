<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'user_id' => $user->isAdmin() ? 'required|exists:users,id' : 'nullable',
        ]);

        if (! $user->isAdmin()) {
            $validated['user_id'] = $user->id;
        }

        $product = Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        $users = auth()->user()->isAdmin()
            ? User::orderBy('name')->get()
            : collect();

        return view('product.create', compact('users'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = $request->user();

        $this->authorize('update', $product);

        $rules = [
            'name' => 'sometimes|string|max:255',
            'qty' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
        ];

        if ($user->isAdmin()) {
            $rules['user_id'] = 'sometimes|exists:users,id';
        }

        $validated = $request->validate($rules);

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $users = User::orderBy('name')->get();

        return view('product.edit', compact('product', 'users'));
    }

    public function export()
    {
        $products = Product::with('user')->get();

        $csvContent = "id,name,qty,price,owner\n";
        foreach ($products as $product) {
            $row = [
                $product->id,
                $product->name,
                $product->qty,
                $product->price,
                $product->user->name ?? '-',
            ];

            $csvContent .= sprintf("%s,%s,%s,%s,%s\n", ...array_map(function ($value) {
                $escaped = str_replace('"', '""', (string) $value);

                return '"'.$escaped.'"';
            }, $row));
        }

        return response($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="products-export.csv"',
        ]);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}
