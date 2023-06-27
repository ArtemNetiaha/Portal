<a href="{{route('admin.'.str(strtolower(class_basename($model)))->plural().'.edit',
                        [strtolower(class_basename($model))=>$model])}}"
   class="btn btn-block btn-default" style="width:41px">
    <i class="fas fa-edit"></i>
</a>
