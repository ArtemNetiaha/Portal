<div class="form-group my-2">
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="on{{$model->id}}"
               onchange="show('{{str(get_class($model))->replace('\\','.')}}','{{route('admin.on-off')}}','{{$model->id}}')"
            @checked($model->show)>
        <label class="custom-control-label" for="on{{$model->id}}"></label>
    </div>
</div>
<script>
    function removeOnMessage(){
        let message=document.querySelector('#onOff')
        if(message)
        message.remove()
    }
    function show(model, route,id){

        fetch(route,{

            method:'PUT',
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
            body:JSON.stringify({
          model,
          id
        })

        })
        let msg=document.createElement('div')
        msg.id="onOff"
        msg.innerHTML=`<div id="toastsContainerOn-off" class="toasts-top-right fixed">
                                <div class="toast bg-success fade show" role="alert" aria-live="assertive" 
                                aria-atomic="true">
                                    <div class="toast-header"><strong class="mr-auto">Success</strong>
                                        <button data-dismiss="toast" onclick="removeMessage()" 
                                        type="button" class="ml-2 mb-1 close" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="toast-body">Hello</div>
                                </div>
                            </div>`
                

                document.querySelector('body').append(msg)
                setTimeout(() => {
        let message=document.querySelector('#toastsContainerOn-off')
        if(message)
        message.remove()
    }, 5000);
    }
</script>

