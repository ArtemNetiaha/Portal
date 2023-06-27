<div>

    @foreach($blocks ?? [] as $block)
        <x-dynamic-component :component="'front-blocks.'.$block->type" :$block />
        <div class="space40"></div>

    @endforeach
</div>

