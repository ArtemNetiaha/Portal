<x-admin.layout title="Posts">
<x-tables.simple
    :labels="['ID','Title']"
    :fields="['id','title']"
    :models="$posts"
    edit
    delete
    show

/>




</x-admin.layout>
