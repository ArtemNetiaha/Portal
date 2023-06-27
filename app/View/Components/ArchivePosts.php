<?php
namespace App\View\Components;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class ArchivePosts extends Component
{
    public function __construct(
        public $dates = null
    )
    {
        $createdDates = Post::select('created_at')->get();

        $this->dates = $createdDates->map(function($data) {
            return [
                'query' => $data->created_at->format('m.Y'),
                'label' => $data->created_at->format('F Y')
            ];
        })->unique();
    }

    public function render(): View|Closure|string
    {
        return view('components.archive-posts');
    }
}