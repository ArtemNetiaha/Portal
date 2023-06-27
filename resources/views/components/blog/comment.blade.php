<li style="margin-left: {{ $margin }}px">
    <div class="message">
        <figure class="user rounded">
            <img alt="" src="{{ asset('style/images/art/u1.jpg') }}"/></figure>
        <div class="message-inner">
            <h6 class="comment-author"><a href="#">{{ $comment->user->name }}</a></h6>
            <p id="body{{ $comment->id }}">{{ $comment->body }}</p>
            @auth
                @can('update', $comment)
                    <form action="{{ route('comments.update', compact('comment')) }}"
                          id="updateForm{{ $comment->id }}"
                          method="post">
                        @csrf
                        @method('put')
                        <textarea name="body" id="txt{{ $comment->id }}" cols="30" rows="10" required
                                  hidden>{{ $comment->body }}</textarea>
                    </form>
                @endcan
            @endauth
            <div class="meta">
                <div id="buttons{{ $comment->id }}">
                    <span class="date">{{ $comment->created_at->diffForHumans() }}</span>
                    @auth
                        <span class="reply" onclick="showForm('{{ $comment->id }}')"
                              style="cursor: pointer">Reply</span>

                        @can('delete', $comment)
                            <span class="reply"
                                  onclick="document.querySelector('#delete{{ $comment->id }}').submit()"
                                  style="cursor: pointer">Delete</span>
                        @endcan
                        @can('update', $comment)
                            <span class="reply"
                                  onclick="editComment('{{ $comment->id }}')"
                                  style="cursor: pointer">Edit</span>
                        @endcan
                    @endauth
                </div>
                <span class="reply" id="save{{ $comment->id }}"
                      onclick="document.querySelector('#updateForm{{ $comment->id }}').submit()"
                      style="cursor: pointer" hidden>Save</span>
            </div>
        </div>
    </div>
    @can('delete', $comment)
        <form id="delete{{ $comment->id }}" method="post"
              action="{{ route('comments.destroy', compact('comment')) }}">
            @csrf
            @method('delete')
        </form>
    @endcan
    <form id="form{{ $comment->id }}" class="comment-form"
          method="post"
          action="{{ route('comments.store') }}" hidden>
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <div class="form-group">
            <textarea name="body" class="form-control" rows="5"
                      placeholder="Enter your comment here..." required></textarea>
        </div>
        <button type="submit" class="btn">Submit</button>
    </form>
</li>
@foreach($comment->comments as $comment)
    <x-blog.comment :$comment :$post margin="{{ $margin + 50 }}"/>
@endforeach
<script>
    let currentId;

    function showForm(id) {
        if (currentId) {
            document.querySelector('#form' + currentId).hidden = true
        }

        document.querySelector('#form' + id).hidden = false
        currentId = id
    }

    function editComment(id) {
        document.querySelector('#body' + id).hidden = true
        document.querySelector('#buttons' + id).hidden = true
        document.querySelector('#txt' + id).hidden = false
        document.querySelector('#save' + id).hidden = false
    }
</script>
