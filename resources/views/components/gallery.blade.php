<style>
    .my-card{
        cursor: pointer;
    }
    .my-card:hover{
    transform: scale(1.1);
    }
</style>
<div>
    <div class="modal fade"  id="gallery" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="width:900px; margin-left:-200px">
            <div class="modal-header">
              <h4 class="modal-title">Gallery</h4>
              
            </div>
            <div class="col-md-5 col-la-4 text-md-right; margin-right:200px">
                <a href="#" class="btn mb-0" data-dismiss="modal" aria-label="Close">Close</a> 
                </div>
            <div class="modal-body">
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
                    <div class="card-body"style="width:1000px">
                        
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach($imageTypes as $imageType)
                            <div class="tab-pane fade @if($loop->index==0) show active @endif" 
                                id="custom-tabs-{{$imageType->id}}" role="tabpanel"
                                 aria-labelledby="custom-tabs-{{$imageType->id}}">
                                <div class="card-body row">
                                    @foreach ($imageType->images as $image)
                                   
                                    <div class="col-md-3">
                                        <div class="card card-dark my-card" onclick="addImage('{{asset($image->path)}}')">
                                            <div class="card-header">
                                              <h3 class="card-title">Image</h3>
                              
                                              <div class="card-tools">
        
                                                
                                              </div>
                                              <!-- /.card-tools -->
                                            </div>
                                            
                                            <div class="card-body">
                                                <img class="w-100" src="{{asset($image->path)}}" alt="">
                                            </div>
                                      
                                          </div>
                                        </div>
                                            
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                   <input type="hidden" id="currentFileInput" value="">
                    
                </div>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
<script>
    async function addImage(path){
        $('#gallery').modal('hide')
        let inputId=document.querySelector('#currentFileInput').value
        let input=document.querySelector('#'+ inputId)
        let blob= await fetch(path).then(result=>result.blob())
        const file=new File([blob], path, {
            type: 'image/*'
        })
        let dataTransfer=new DataTransfer()
        dataTransfer.items.add(file)
        input.files=dataTransfer.files 
        document.querySelector('#preview'+ inputId).src=path
          
    }
</script>