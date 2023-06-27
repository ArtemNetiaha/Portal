<div class="sidebox widget">
    <h3 class="widget-title">Categories</h3>
    <ul class="icon-list">
        @foreach($categories as $category)
            <li class="bullet-default"><i class="jam jam-chevron-right"></i>
                <a href="{{ route('posts.index', ['category' => $category->id]) }}"
                >{{ $category->title }} ({{ $category->postsCount }})</a>
            </li>
        @endforeach
    </ul>
</div>
