<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopOrderController extends Controller
{
    public function checkout(Product $product)
    {
        // lock the reserve quantity of the product
        // use DB transactions
        DB::transaction(function () use ($product) {
            
            $order_status_id = DB::select('select id from order_status where name = \'Created\' limit 1');
//dd($order_status_id[0]->id);
            DB::insert('insert into shop_orders (user_id, product_id, order_status_id, qty, subtotal) values (?, ?, ?, ?, ?)', 
            [
                auth()->user()->id, 
                $product->id,
                $order_status_id[0]->id,
                1,
                $product->actual_price * 1
            ]);
         
            DB::update('update products set qty_in_stock = qty_in_stock - 1 where id = ' . $product->id );
            
        }, 5);

        // send email with payment link

        return view('shop_orders.checkout', compact('product'));
    }

    public function pay()
    {

        return view('shop_orders.payment');
    }
}
