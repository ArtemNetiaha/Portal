<x-blog-layout title="PORTAL | POST">
    <div class="wrapper light-wrapper">
        <div class="container inner pt-80">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog classic-view">
                        <div class="post mb-0">
                            <figure class="rounded"><img src="{{ asset($post->image) }}" alt=""/></figure>
                            <div class="space40"></div>
                            <div class="post-content">
                                <div class="category text-center">
                                    <a href="#" class="badge badge-pill bg-hibiscus">{{ $post->category?->title }}</a>
                                </div>
                                <h2 class="post-title text-center">{{ $post->title }}</h2>
                                <div class="meta text-center"><span class="date">
                                        <i class="jam jam-clock"></i>{{ $post->created_at->format('d M Y') }}</span>
                                    <span class="author"><i class="jam jam-user"></i><a
                                            href="#">By {{ $post->user->name }}</a></span>

                                        <x-authors.subscribe :author="$post->user" />

                                        <x-blog.reactions :$post/>

                                    <span class="comments">
                                        <i class="jam jam-message-alt"></i>
                                        <a href="#">{{ $post->commentNumber }} {{ $post->commentNumber==1 ? 'Comment' : 'Comments'}}</a>
                                    </span>
                                </div>
                               <x-blog.blocks :blocks="$post->blocks"/>

                                <div class="space30"></div>

                                <div class="d-lg-flex justify-content-between align-items-center meta-footer">
                                    <ul class="list-unstyled tag-list">
                                        @foreach($post->tags as $tag)
                                            <li><a href="#" class="btn btn-s">{{ $tag->title }}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="space20 d-lg-none"></div>
                                    <div class="d-flex align-items-center">
                                        <p class="pr-20 mb-0"><strong>Share on:</strong></p>
                                        <ul class="social social-mute">
                                            <li><a href="#"><i class="jam jam-facebook"></i></a></li>
                                            <li><a href="#"><i class="jam jam-twitter"></i></a></li>
                                            <li><a href="#"><i class="jam jam-pinterest"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                                @auth
                                    @can('update', $post)
                                        <form method="post" action="{{ route('posts.destroy', compact('post')) }}">
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-warning"
                                               href="{{ route('posts.edit', compact('post')) }}">Edit</a>
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <x-blog.author :author="$post->user"/>
    <x-blog.recent/>
    <x-blog.comments :$post :comments="$post->comments"/>

</x-blog-layout>
