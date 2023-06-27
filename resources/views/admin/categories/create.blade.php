<x-admin.layout title="Create Category">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                            <p style="color: darkred">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-buttons.save/>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
