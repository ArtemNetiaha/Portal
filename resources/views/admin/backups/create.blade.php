<x-admin.layout title="Create Backups">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.backups.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
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
