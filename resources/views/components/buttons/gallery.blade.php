<button type="button" class="btn btn-dark"
        data-toggle="modal" data-target="#gallery"
        onclick="setCurrentId('{{$id}}')">
    <i class="fas fa-trash"></i>
    Gallery
</button>
<script>
    function setCurrentId(id){
        document.querySelector('#currentFileInput').value=id

    }
</script>
