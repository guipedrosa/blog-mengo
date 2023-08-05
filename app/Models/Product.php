<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'product_image', 'initial_price', 'final_price'];

    protected function initialPrice(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => number_format(round($value/100, 2), 2)
            //get: fn (int $value) => $value

        );
    }
}
