<x-blog-layout title="PORTAL | CREATE POST">

    <div class="wrapper light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <h2 class="section-title mb-40 text-center">Edit Post</h2>
                    <form action="{{ route('posts.update', compact('post')) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" name="title" value="{{ $post->title }}">
                        </div>
                        <input type="hidden" class="form-control"
                                name="slug" value="{{ $post->slug }}">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control"
                                      id="description" name="description">{{ $post->description }}</textarea>
                        </div>

                        <x-category-select :current="$post->category_id" />

                        <x-tag-select :current="$post->tags"/>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="d-flex">
                                <input type="file" class="form-control"
                                        onchange="document.querySelector('#previewimage').hidden=true"
                                        id="image" name="image">
                                <x-buttons.gallery id="image"/>
                            </div>
                                   <img id="previewimage"
                                   src="{{asset($post->image)}}" width="300" alt="old picture">
                        </div>
                        <div class="my-4">
                            @foreach($post->blocks as $block)
                                <x-dynamic-component :component="'blocks.'.$block->type" :$block :$block :sub="0"/>
                            @endforeach
                        </div>


                        <a href="{{route('posts.add-block', compact('post'))}}"  class="btn">Add Post Block</a>
                        <button type="submit" class="btn">Submit</button>
                    </form>
                   <x-forms.delete-item/>


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
<x-gallery/>
<x-modals.sublocks/>
</x-blog-layout>
