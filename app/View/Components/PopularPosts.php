<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PopularPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $posts=null 
    )
    {
        $this->posts=Post::withCount('reactions as likes','commentsCount as commentNumber')
        ->orderBy('likes', 'desc')
        ->latest()->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popular-posts');
    }
}
