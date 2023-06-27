<div class="form-group my-2">
    <label for="">{{$input['label']}}</label>
    <input class="form-control" type="number"
           name="blocks[{{$block->id}}][{{$input['name']}}]"
           value="{{$block->content->{$input['name'] } ?? '' }}">
</div>
