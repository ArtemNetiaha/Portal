<label for="">{{$input['label']}}</label>
<input  type="hidden"
       name="blocks[{{$block->id}}][{{$input['name']}}]"
       value="{{$block->content->{$input['name'] } ?? '' }}">
       <div class="d-flex">
              <input class="form-control" type="file" id="blockImage{{$block->id.$input['name']}}"
                     name="blocks[{{$block->id}}][{{$input['name']}}]"
                     value="{{$block->content->{$input['name'] } ?? '' }}">
              <x-buttons.gallery id="blockImage{{$block->id.$input['name']}}" />
</div>
@if($block->content->{$input['name']} ?? '')
    <img id="previewblockImage{{$block->id.$input['name']}}"
    src="{{ asset($block->content->{$input['name'] } ?? '' )}}" width="300" alt="">
@endif
