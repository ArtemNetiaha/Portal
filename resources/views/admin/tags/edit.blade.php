<x-admin.layout title="Edit Tag">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.tags.update', compact('tag')) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Tag</label>
                            <input type="text" class="form-control"
                                   id="title" name="title" value="{{ old('title',$tag->title) }}">

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
    <x-modals.delete :model="$tag"/>
</x-admin.layout>
