<div class="sidebox widget">
    <h3 class="widget-title">Archive</h3>
    <ul class="icon-list">
        @foreach($dates as $date)
        <li class="bullet-default"><i class="jam jam-chevron-right"></i>
            <a href="{{route('posts.index',['date'=>$date['query']])}}">{{$date['label']}}</a></li>
        @endforeach
    </ul>
</div>