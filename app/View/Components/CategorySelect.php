<?php

namespace App\View\Components;


use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorySelect extends Component
{
    public $categories;
    public $current;
    /**
     * Create a new component instance.
     */
    public function __construct($current = null)
    {
        $this->categories = Category::all();
        $this->current = $current;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-select');
    }
}
