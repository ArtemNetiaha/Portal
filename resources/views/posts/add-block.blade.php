<x-blog-layout title="PORTAL | ADD BlOCK">
 <div class="text-center my-4">
     <div class="text-center my-4">
        <h1>Add Block</h1>
     </div>
 </div>
<div class="row">

    @foreach($blocks as $block)


    <form action="{{route('posts.store-block', compact('post'))}}"
          method="post" class="col-md-4" id="{{$block}}" onclick="sendForm('{{$block}}')" >
        @csrf
        <input type="hidden" name="type" value="{{$block}}">
        <div class="text-center my-4">
            <h2>{{ucfirst($block)}}</h2>
        </div>

        <img class="w-100 mx-4" style="cursor: pointer" src="{{asset("blocks/$block.png")}}" alt="">
    </form>
    @endforeach

</div>
</x-blog-layout>
