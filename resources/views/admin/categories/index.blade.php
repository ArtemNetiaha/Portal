<x-admin.layout title="Categories">
<x-tables.simple
    :labels="['id','Name']"
    :fields="['id','title']"
    :models="$categories"
    edit
    delete
    sort
    show
/>
    <x-buttons.create link="{{route('admin.categories.create')}}">Add Category</x-buttons.create>



</x-admin.layout>
