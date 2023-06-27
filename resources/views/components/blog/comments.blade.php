<div class="wrapper gray-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="comments">
                    <h3>5 Comments</h3>
                    <ol id="singlecomments" class="commentlist">
                        @foreach($comments as $comment)
                            <x-blog.comment :$comment :$post margin="0"/>
                        @endforeach
                    </ol>
                </div>
                <!-- /#comments -->
                @auth()
                <div class="space80"></div>
                <h3>Would you like to share your thoughts?</h3>
                <div class="space20"></div>

                <form class="comment-form" method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <textarea name="body" class="form-control" rows="5"
                                  placeholder="Enter your comment here..." required></textarea>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
                @endauth
                <!-- /.comment-form -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
