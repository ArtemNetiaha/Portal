<div class="form-group">
    <label for="">Tags</label>
    @foreach($tags as $tag)
        <div>
            <input type="checkbox" value="{{ $tag->id }}"
                   @checked($current?->contains($tag))
                   name="tags[]">
            <label for="">{{ $tag->title }}</label>
        </div>
    @endforeach
</div>
