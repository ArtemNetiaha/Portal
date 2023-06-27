<div class="pricing panel box  shadow my-4" style="background-color: lightcyan">
    <div class="d-flex justify-content-between">
        <p>{{$title}}</p>
        <button type="button" class="btn btn-default "
                onclick="deleteItem('{{$block->id}}','{{str(get_class($block))->replace ('\\', '.')}}')">x
        </button>
    </div>
@php
    if(isset($sub)&& $sub){
        $inputs=$subBlocks;
    }
@endphp

    @foreach($inputs as $input)
        @php
        $input['name']=$input['name'] ?? str($input['label'])->snake()
        @endphp
        <x-dynamic-component :component="'input.'.$input['type']" :$input :$block />
    @endforeach

    <div class="my-4">
        @if(count($block->blocks))
        <h2>Subblocks</h2>
        @endif
        @foreach($block->blocks ??[] as $block)
            <x-dynamic-component :component="'blocks.'.$block->type" :$block sub="1" />
        @endforeach
    </div>
    {{-- @if(count($block->blocks)) --}}
    @if(isset ($subBlocks)&& isset($sub)&&(!$sub))
    <button type="button" class="btn btn-primary"
        data-toggle="modal" data-target="#modal-add-sub-blocks" onclick="document.querySelector('#blockId').value='{{$block->id}}'">
        Add Sub Blocks
</button>
   
    @endif
    {{-- @endif --}}
</div>

