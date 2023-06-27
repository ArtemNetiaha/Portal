<x-admin.layout title="Contacts">
<x-tables.simple
    :labels="['id','Email','Date']"
    :fields="['id','email','created_at']"
    :models="$contacts"
    delete
   
    
/>
<x-buttons.export link="{{route('admin.contacts.export')}}"/>
</x-admin.layout>
