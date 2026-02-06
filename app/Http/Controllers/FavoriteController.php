<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;

class FavoriteController extends Controller
{
    public function toggle(Product $product)
    {
        $user = auth()->user();
        $favorite = $user->favorites()->where('product_id', $product->id)->first();

        if ($favorite) {
            $favorite->delete();
            $isFavorite = false;
        } else {
            $user->favorites()->create(['product_id' => $product->id]);
            $isFavorite = true;
        }

        return response()->json([
            'success' => true,
            'is_favorite' => $isFavorite,
            'message' => $isFavorite ? __('Produit ajouté aux favoris') : __('Produit retiré des favoris')
        ]);
    }

    public function index()
    {
        $products = auth()->user()->favorites()->with('product.category')->get()->pluck('product');
        return view('products.favorites', compact('products'));
    }
}
