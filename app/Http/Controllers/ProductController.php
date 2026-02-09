<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\Product::with('category')->where('status', 'active');

        if ($request->ajax()) {
            if ($request->filled('category') && $request->category !== 'all') {
                $query->whereHas('category', function($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            }

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name_en', 'like', "%{$search}%")
                      ->orWhere('name_fr', 'like', "%{$search}%")
                      ->orWhere('name_ar', 'like', "%{$search}%");
                });
            }

            $products = $query->paginate(6);
            
            // Ensure the computed attributes are included in the JSON
            $products->getCollection()->transform(function ($product) {
                $product->append(['name', 'description']);
                if (auth()->check()) {
                    $product->is_favorite = auth()->user()->favorites()->where('product_id', $product->id)->exists();
                } else {
                    $product->is_favorite = false;
                }
                return $product;
            });

            return response()->json($products);
        }

        $products = $query->paginate(6);
        $categories = \App\Models\Category::all();
        
        return view('products.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'status' => 'required|in:active,draft,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'weight_kg' => 'nullable|numeric',
            'pieces_per_bundle' => 'nullable|integer'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image_url'] = '/storage/' . $imagePath;
        }

        \App\Models\Product::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Product created successfully');
    }

    public function create()
    {
        return view('products.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = \App\Models\Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Display the technical sheet for the specified resource.
     */
    public function technicalSheet(string $id)
    {
        $product = \App\Models\Product::with('category')->findOrFail($id);
        return view('products.technical-sheet', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'status' => 'required|in:active,draft,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'weight_kg' => 'nullable|numeric',
            'pieces_per_bundle' => 'nullable|integer'
        ]);

        $product = \App\Models\Product::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_url) {
                $oldImagePath = str_replace('/storage/', '', $product->image_url);
                \Storage::disk('public')->delete($oldImagePath);
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image_url'] = '/storage/' . $imagePath;
        }

        $product->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}
