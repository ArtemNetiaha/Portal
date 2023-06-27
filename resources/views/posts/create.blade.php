<x-blog-layout title="PORTAL | CREATE POST">

    <div class="wrapper light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <h2 class="section-title mb-40 text-center">Create Post</h2>
                    <form action="{{ route('posts.store') }}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title') }}" required>
                            @error('title')
                            <p style="color: darkred">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control"
                                      id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <p style="color: darkred">{{ $message }}</p>
                            @enderror
                        </div>


                        <x-category-select/>

                        <x-tag-select/>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control"
                                   id="image" name="image" required>
                        </div>

                        <button type="submit" class="btn">Submit</button>
                    </form>
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

</x-blog-layout>
