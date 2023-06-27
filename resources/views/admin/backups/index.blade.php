<x-admin.layout title="Beckups">
<x-tables.simple
    :labels="['id','Name','Date']"
    :fields="['id','name','created_at']"
    :models="$backups"
    edit
    
/>
    <x-buttons.create link="{{route('admin.backups.create')}}">Create Backups</x-buttons.create>
    <x-buttons.create link="{{route('admin.backups.create-from-file')}}">Create From File</x-buttons.create>



</x-admin.layout>
