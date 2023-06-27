<x-admin.layout title="Edit Category">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.categories.update', compact('category')) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" name="title" value="{{ old('title',$category->title) }}">

                            @error('title')
                            <p style="color: darkred">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-buttons.save/>
                        <x-buttons.delete/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-modals.delete :model="$category"/>
</x-admin.layout>
