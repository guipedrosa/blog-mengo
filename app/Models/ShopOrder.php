<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopOrder extends Model
{
    use HasFactory;

    protected $table = 'shop_orders';

    protected $fillable = [
        'user_id',
        'product_id',
        'order_status_id',
        'qty',
        'total',
        'actual_price',
        'order_code'
    ];

    public function getSubtotal()
    {
        return number_format(round($this->total/100, 2), 2, ",", ".");
    }

    public function getActualPrice()
    {
        return number_format(round($this->actual_price/100, 2), 2, ",", ".");
    }  

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}