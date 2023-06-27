<div id="on-off" class="toasts-top-right fixed" hidden>
    <div class="toast bg-{{session('color') ?? 'succes'}} fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"><strong class="mr-auto">Success</strong>
            <button data-dismiss="toast" onclick="removeMessage()" type="button" class="ml-2 mb-1 close" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">{{session('message')}}</div>
    </div>
</div>


<script>
    function removeMessage(){
        let message=document.querySelector('#toastsContainer')
        if(message)
        message.remove()
    }
    setTimeout(() => {
        removeMessage()
    }, 5000);
</script>