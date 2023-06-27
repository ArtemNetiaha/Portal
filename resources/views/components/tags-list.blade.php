<div class="sidebox widget">
    <h3 class="widget-title">Tags</h3>
    <ul class="list-unstyled tag-list">
        @foreach($tags as $tag)
        <li>
            <a href="{{ route('posts.index', ['tag' => $tag->id]) }}"
               class="btn btn-s">{{ $tag->title }}</a>
        </li>
        @endforeach
    </ul>
</div>
