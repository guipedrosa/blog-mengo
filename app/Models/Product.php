<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'product_image', 
        'initial_price', 
        'final_price'
    ];

    public function getInitialPrice()
    {
        return number_format(round($this->initial_price/100, 2), 2, ",", ".");
    }

    public function getFinalPrice()
    {
        return number_format(round($this->final_price/100, 2), 2, ",", ".");
    }
}
