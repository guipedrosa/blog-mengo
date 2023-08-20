<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopOrderController extends Controller
{
    public function checkout(Product $product)
    {
        // lock the reserve quantity of the product
        // use DB transactions

        // send email with payment link

        return view('shop_orders.checkout', compact('product'));
    }

    public function pay()
    {

        return view('shop_orders.payment');
    }
}
