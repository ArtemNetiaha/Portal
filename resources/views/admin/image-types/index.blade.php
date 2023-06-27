<x-admin.layout title="Image Types">
<x-tables.simple
    :labels="['id','Name']"
    :fields="['id','name']"
    :models="$imageTypes"
    edit
    sort
   
    
/>
    <x-buttons.create link="{{route('admin.imagetypes.create')}}">Add Image Types</x-buttons.create>



</x-admin.layout>
