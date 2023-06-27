<x-blog-layout title="PORTAL | BLOG">

    <div class="wrapper light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog grid grid-view">
                        <div class="row isotope">
                            @foreach($posts as $post)
                                <x-blog.post :post="$post"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="space30 d-block d-md-none"></div>

                    {{ $posts->links() }}

                </div>
                <div class="space30 d-none d-md-block d-lg-none"></div>
                <x-blog.aside :$settings/>
            </div>
        </div>
    </div>

</x-blog-layout>
