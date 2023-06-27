<x-admin.layout title="Tagss">
<x-tables.simple
    :labels="['Id','Name']"
    :fields="['id','title']"
    :models="$tags"
    edit
    delete sort show
/>
    <x-buttons.create link="{{route('admin.tags.create')}}">Add Tag</x-buttons.create>

</x-admin.layout>
