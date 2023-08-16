<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Product::query()
        //     ->where('active', '=', 1)
        //     ->whereDate('published_at', '<', Carbon::now())
        //     ->orderBy('published_at', 'desc')
        //     ->paginate(5);

        return view('products.showcase');
    }

    public function showcase()
    {
        // $posts = Product::query()
        //     ->where('active', '=', 1)
        //     ->whereDate('published_at', '<', Carbon::now())
        //     ->orderBy('published_at', 'desc')
        //     ->paginate(5);

        return view('products.showcase');
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        return view('products.show', ['product' => $product]);
    }
}
