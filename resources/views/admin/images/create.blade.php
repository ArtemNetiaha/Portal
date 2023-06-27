<x-admin.layout title="Add Images">

    <div class="row">
        <form class="col-md-6" 
            action="{{route('admin.image.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Image Type</label>
                    <select class="form-control" name="image_type_id" id="">
                        @foreach ($imageTypes as $imageType)
                        <option value="{{$imageType->id}}">{{$imageType->name}}</option>
                            
                        @endforeach

                    </select>
            </div>
            <div class="form-group">
                <label for="">Images</label>
                <input class="form-control" type="file" name="images[]" multiple>
            </div>
            <div>
                <x-buttons.save/>
            </div>
                  
        </form>
    </div>

</x-admin.layout>
