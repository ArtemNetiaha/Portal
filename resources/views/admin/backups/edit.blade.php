<x-admin.layout title="Edit Backup">

            <div class="row">
                <div class="col-md-6">

                    <form action="{{ route('admin.backups.update', compact('backup')) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" name="name" value="{{ old('name',$backup->name) }}">

                            @error('name')
                            <p style="color: darkred">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-buttons.save/>
                        <x-buttons.delete/>
                        <x-buttons.recover/>
                        <x-buttons.download :$backup/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-forms.recover :$backup/>
    <x-modals.delete :model="$backup"/>
</x-admin.layout>
