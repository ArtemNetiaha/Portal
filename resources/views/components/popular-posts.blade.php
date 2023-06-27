
     <div class="sidebox widget">
        <h3 class="widget-title">Popular Posts</h3>
        <ul class="image-list">
            @foreach ($posts as $post)
            <li>
                <figure class="rounded">
                    <a href="{{ route('posts.show', compact(['post'])) }}">
                        <img src="{{asset($post->image)}}"
                         alt=""/>
                    </a></figure>
                <div class="post-content">
                    <h6 class="post-title"><a href="blog-post.html">{{$post->title}}</a>
                    </h6>
                    <div class="meta"><span class="date"><i class="jam jam-clock"></i>{{$post->created_at->diffForhumans()}}</span>
                        <span class="comments">
                            <i class="jam jam-message-alt"></i>
                            <a href="#">{{$post->commentNumber}}</a>
                        </span>
                        <span class="comments">
                            <i class="jam jam-heart-f"></i>{{$post->likes}}
                        </span>
                    </div>
                </div>
            </li>
            @endforeach
         
        </ul>
      
    </div>


    