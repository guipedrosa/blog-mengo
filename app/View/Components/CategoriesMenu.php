<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CategoriesMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $categories = Category::query()
                        ->join('categoriables', 'categories.id', '=', 'categoriables.category_id')
                        ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
                        ->groupBy('categories.id')
                        ->orderByDesc('total')
                        ->limit(5)
                        ->get();

        return view('components.categories-menu', compact('categories'));
    }
}
