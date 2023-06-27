@auth
    @if(auth()->user()->authors->contains($author))
        <span class="author">
            <i id="subscribe-icon-{{ $author->id }}" class="jam jam-minus"></i>
             <a id="subscribe-link-{{ $author->id }}"
                href="#"
                onclick="unsubscribe('{{ route('unsubscribe', ['user' => $author]) }}', '{{ $author->id }}', '{{ csrf_token() }}')"
             >UNSUBSCRIBE</a>
        </span>
    @else
        <span class="author">
            <i id="subscribe-icon-{{ $author->id }}" class="jam jam-plus"></i>
             <a id="subscribe-link-{{ $author->id }}"
                href="#"
                onclick="subscribe('{{ route('subscribe', ['user' => $author]) }}', '{{ $author->id }}', '{{ csrf_token() }}')"
             >SUBSCRIBE</a>
        </span>
    @endif
@endauth

