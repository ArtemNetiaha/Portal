<?php

namespace App\View\Components;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagsList extends Component
{
    public $tags;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tags = Tag::orderBY('sort')->where('show', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tags-list');
    }
}
