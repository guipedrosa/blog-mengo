<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopOrderController extends Controller
{
    public function checkout(int $id)
    {
        // lock the reserve quantity of the product
        
        // send email with payment link

        return view('shop_orders.checkout');
    }
}
