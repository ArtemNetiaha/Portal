<x-admin.layout title="Images">
    <div class="card card-dark">
       
        <div class="card card-dark card-tabs m-4 ">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                   @foreach($imageTypes as $imageType)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->index==0) active @endif" 
                            
                           data-toggle="pill" href="#custom-tabs-{{$imageType->id}}"
                           role="tab" aria-controls="custom-tabs-{{$imageType->id}}" 
                           aria-selected="true">{{$imageType->name}}</a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
            <div class="card-body">
                
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    @foreach($imageTypes as $imageType)
                    <div class="tab-pane fade @if($loop->index==0) show active @endif" 
                        id="custom-tabs-{{$imageType->id}}" role="tabpanel"
                         aria-labelledby="custom-tabs-{{$imageType->id}}">
                        <div class="card-body row">
                            @foreach ($imageType->images as $image)
                           
                            <div class="col-md-3">
                                <div class="card card-dark">
                                    <div class="card-header">
                                      <h3 class="card-title">Image</h3>
                      
                                      <div class="card-tools">

                                        <button type="button" onclick="sendForm('delete-image-{{$image->id}}')"
                                        class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                      <!-- /.card-tools -->
                                    </div>
                                    
                                    <div class="card-body">
                                        <img class="w-100" src="{{asset($image->path)}}" alt="">
                                    </div>
                              
                                  </div>
                                </div>
                                    <form action="{{route('admin.deleteItem')}}" id="delete-image-{{$image->id}}" method="post">
                                       
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{$image->id}}">
                                        <input type="hidden" name="model" value="{{str(get_class($image))->replace ('\\', '.')}}">
                                    </form> 
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            
        </div>
        
    </div>
</x-admin.layout>