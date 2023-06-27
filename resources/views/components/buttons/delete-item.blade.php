<form action="{{route('admin.'.str(strtolower(class_basename($model)))->plural().'.destroy',
    [strtolower(class_basename($model))=>$model])}}"
    method="post">
    @csrf
    @method('delete')

<button
   class="btn btn-block btn-default" style="width:41px">
    <i class="fas fa-trash"></i>
</a>
</button>
</form>
