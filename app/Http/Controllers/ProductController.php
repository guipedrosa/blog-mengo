<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function showcase()
    {
        $products = Product::query()
                    ->where('actual_price', '>', 0)
                    ->orderBy('updated_at', 'desc')
                    ->limit(8)
                    ->get();
        
        //dd($products);

        return view('products.showcase', compact('products'));
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        return view('products.show', ['product' => $product]);
    }
}
