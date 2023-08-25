<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopOrderController extends Controller
{
    public function checkout(Request $request)
    {
        //dd($request->all());

        // lock the reserve quantity of the product
        // use DB transactions
        
        $product = Product::find($request->input('product'));
        $quantity = $request->input('quantity');

        DB::transaction(function () use ($product, $quantity) {
            
            $order_status_id = DB::select('select id from order_status where name = \'Created\' limit 1');

            DB::insert('insert into shop_orders (user_id, product_id, order_status_id, qty, subtotal) values (?, ?, ?, ?, ?)', 
            [
                auth()->user()->id, 
                $product->id,
                $order_status_id[0]->id,
                $quantity,
                $product->actual_price * $quantity
            ]);
         
            DB::update('update products set qty_in_stock = qty_in_stock - '. $quantity .' where id = ' . $product->id );
            
        }, 5);

        // send email with payment link
        //
        //

        return redirect()->route('congratulations', $product);
        
    }

    public function pay()
    {

        return view('shop_orders.payment');
    }

    public function congratulations(Product $product)
    {
        return view('shop_orders.checkout', compact('product'));
    }
}
