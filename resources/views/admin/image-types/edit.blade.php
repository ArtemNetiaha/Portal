<x-admin.layout title="Edit Image Type">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.imagetypes.update', compact('imagetype')) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control"
                                   id="title" name="name" value="{{ old('name', $imagetype->name) }}">

                            @error('name')
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
    <x-modals.delete :model="$imagetype"/>
</x-admin.layout>
