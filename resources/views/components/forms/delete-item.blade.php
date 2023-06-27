<form action="{{route('admin.deleteItem')}}" id="deleteItem" method="post">
    @csrf
    @method('delete')
    <input type="hidden" name="model" id="model">
    <input type="hidden" name="id" id="id">
</form>
