<div class="post-gallery light-gallery-wrapper">
    <div class="tiles tiles-s">
        <div class="items d-flex justify-content-center">
            <div class="item">
                <figure class="overlay overlay1 rounded">
                    <span class="bg"></span>
                    <img src="{{ asset($block->content?->image ?? '') }}"
                         alt="{{$block->content?->image_alt ?? ''}}">
                   
                </figure>
            </div>
            
        </div>
    </div>
</div>
