<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogLayout extends Component
{
    public $settings;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title)
    {

        $settings=Setting::first();
        $this->settings=$settings?->getByLocale();

        $this->title=$this->settings?->title;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-layout');
    }
}
