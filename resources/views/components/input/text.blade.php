<div class="form-group my-2">
    <label for="">{{$input['label']}}</label>
    <textarea class="form-control" type="text" name="blocks[{{$block->id}}][{{$input['name']}}]"
             >{{$block->content->{$input['name']} ?? '' }}</textarea>
</div>
