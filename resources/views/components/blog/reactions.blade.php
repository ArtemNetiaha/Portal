@auth
@if(!$post->reactions->contains(auth()->user()))
    <span id="like-span" class="author" onclick="like()"
          style="cursor:pointer">
        <i id="like-icon" class="jam jam-heart"></i>
        <span id="likes">{{$post->likes}}</span>

    </span>
@else
    <span id="like-span" class="author" onclick="dislike()"
          style="cursor:pointer" >
        <i id="like-icon" class="jam jam-heart-f"></i>
        <span id="likes">{{$post->likes}}</span>
    </span>
@endif

<script>
    let likes=parseInt('{{$post->likes}}')
    function like(){
        document.querySelector('#like-icon').className='jam jam-heart-f'
        document.querySelector('#like-span').setAttribute('onclick','dislike()')

        likes++
        document.querySelector('#likes').innerHTML=likes
        fetch('{{route('reactions.store',compact('post'))}}',{
            method:'POST',
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            }

        })
    }
    function dislike(id){
        document.querySelector('#like-icon').className='jam jam-heart'
        document.querySelector('#like-span').setAttribute('onclick','like()')

        likes--
        document.querySelector('#likes').innerHTML=likes
        fetch('{{route('reactions.store',compact('post'))}}',{
            method:'DELETE',
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            }

        })
    }
</script>
@endauth
