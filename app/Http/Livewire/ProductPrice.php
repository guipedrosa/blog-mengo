<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductPrice extends Component
{    
    public $product;
    public $type_component = 'product-price';

    public function mount()
    {
        //$this->product_id = Product::find();
        //dd($this->product_id);
    }

    public function render()
    {
        return view('livewire.' . $this->type_component);
    }
}
