<?php

namespace App\View\Components;

use Closure;
use App\Models\ImageType;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Gallery extends Component
{
    public $imageTypes;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
      $this->imageTypes=ImageType::orderBy('sort')->with('images')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery');
    }
}
