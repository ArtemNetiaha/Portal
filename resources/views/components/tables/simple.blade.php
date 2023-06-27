
    <table class="table table-bordered">
      <thead>
        <tr>

            @foreach ($labels as $label)
                <th>{{$label}}</th>
           @endforeach
            @isset($show)
                    <th style="width:60px">Show</th>
            @endisset
                @isset($sort)

                        <th style="width:60px">Sort</th>

                @endisset
                @isset($edit)
                    <th style="width:60px">Edit</th>
                @endisset($edit)

                @isset($delete)
                <th style="width:60px">Delete</th>
            @endisset

        </tr>
      </thead>
      <tbody class="sortable">
        @foreach($models as $model)

        <tr>
            @foreach($fields as $field)
          <td>{{$model->{ $field } }}</td>
          @endforeach
                @isset($show)
                    <td>
                        <x-buttons.on-off :$model/>
                    </td>
                @endisset
                @isset($sort)
                    <td>

                        <input type="hidden" name="sort[]" value="{{$model->id}}" form="save-order">
                        <x-buttons.sort :$model/>
                    </td>
                @endisset
                @isset($edit)
                   <td>
                   <x-buttons.edit :$model/>
                   </td>
                @endisset($edit)

                @isset($delete)
                   <td>
                   <x-buttons.delete-item :$model/>
                   </td>
                @endisset
        </tr>
        @endforeach
        @if($models->count())
<input type="hidden" name="model" value="{{get_class($model)}}" form="save-order">
        @endif
      </tbody>
    </table>
    <form  id="save-order"></form>
    <script>
        $ ( function(){
            $( ".sortable"). sortable ({
                handle:".handle", update:function(){
                  let array=$('#save-order').serializeArray()
                    fetch('{{route('admin.sort')}}',{
                        method:'PUT',
                        headers:{
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN':'{{csrf_token()}}'
                        },
                        body:JSON.stringify(array)

                    })
                }
            });
        });
    </script>
