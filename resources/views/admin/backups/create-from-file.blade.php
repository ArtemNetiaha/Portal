<x-admin.layout title="Create Backups From File">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.backups.store-from-file') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" name="name" value="{{ old('name') }}"required>
                            @error('name')
                            <p style="color: darkred">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Archive</label>
                            <input type="file" class="form-control"
                                   id="title" name="archive" value="{{ old('name') }}"required>
                            @error('archive')
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
