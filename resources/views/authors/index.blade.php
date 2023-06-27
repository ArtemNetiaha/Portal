<x-blog-layout title="PORTAL | BLOG">

    <div class="wrapper light-wrapper">
        <div class="container inner">
            <h2 class="section-title mb-40 text-center">Authors</h2>
            <div class="row text-center">
                @foreach($authors as $author)
                    <div class="col-md-4">
                        <figure class="img-blob blob1 mb-25">
                            <img src="{{ asset('style/images/art/te1.jpg') }}"
                                 style="width: 15rem"
                                 alt=""/></figure>
                        <h4 class="mb-15">{{ $author->name }}</h4>

                        <div class="meta mb-5">Author</div>
                        <div class="meta text-center">
                            <x-authors.subscribe :$author />
                        </div>
                        <ul class="social social-s ml-auto">
                            <li><a href="#"><i class="jam jam-twitter"></i></a></li>
                            <li><a href="#"><i class="jam jam-facebook"></i></a></li>
                            <li><a href="#"><i class="jam jam-instagram"></i></a></li>
                        </ul>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

</x-blog-layout>
