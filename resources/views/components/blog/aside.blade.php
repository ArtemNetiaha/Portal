<aside class="col-lg-4 sidebar">
    <div class="sidebox widget">
        <h3 class="widget-title">Search</h3>
        <form action="{{ route('posts.index') }}"
              method="get"
              class="search-form fields-white">
            <div class="form-group">
                <input name="q" type="text" class="form-control" placeholder="Search something">
            </div>
        </form>
    </div>
    <!-- /.widget -->
    <div class="sidebox widget">
        <h3 class="widget-title">About Us</h3>
        <p>{{$settings?->about}}</p>
        <ul class="social social-color social-s">
            <li><a href="#"><i class="jam jam-twitter"></i></a></li>
            <li><a href="{{$settings?->facebook}}"><i class="jam jam-facebook"></i></a></li>
            <li><a href="#"><i class="jam jam-pinterest"></i></a></li>
            <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
            <li><a href="{{$settings?->instagram}}"><i class="jam jam-instagram"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <x-popular-posts/>

    <!-- /.widget -->
    <x-categories-list/>

    <!-- /.widget -->
    <x-tags-list />
    <x-archive-Posts/>
</aside>
