<div class="item post grid-sizer col-md-6">
    <figure class="overlay overlay1 rounded mb-30">
        <a href="{{ route('posts.show', compact(['post'])) }}">
            <img src="{{ asset($post->image) }}" alt=""/></a>
        <figcaption>
            <h5 class="from-top mb-0">Read More</h5>
        </figcaption>
    </figure>
    <div class="category">
        @if($post->category)
        <a href="{{ route('posts.index', ['category' => $post->category->id]) }}"
        class="badge badge-pill bg-purple">{{ $post->category->title }}</a>
        @endif
    </div>
    <div class="category">
        @if(!$post->show)
        <span
           class="badge badge-pill bg-red">unpublished</span>
        @endif
    </div>
    <h2 class="post-title">
        <a href="{{ route('posts.show', compact(['post'])) }}">{{ $post->title }}</a>
    </h2>
    <div class="post-content">
        <p>{{ $post->description }}</p>
    </div>
    <div class="meta mb-0">
        <div class="comments">
            BY {{ $post->user->name }}
            <span class="date">
                <i class="jam jam-heart-f"></i>{{$post->likes}} Likes
            </span>
        </div>
        <span class="date">
            <i class="jam jam-clock"></i>{{ $post->created_at->format('d M Y') }}</span>
        <span class="comments"><i class="jam jam-message-alt"></i>
            <a href="#">{{$post->commentNumber}}</a>
        </span>
    </div>
</div>
