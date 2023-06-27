<x-admin.layout title="Create Image Type">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.imagetypes.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control"
                                   id="title" name="name" value="{{ old('name') }}">
                            @error('name')
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
