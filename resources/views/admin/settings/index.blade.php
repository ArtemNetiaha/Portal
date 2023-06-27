<x-admin.layout title="Settings">
    <form action="{{ route('admin.settings.update', compact('setting')) }}"
          method="post"
          class="col-md-6">
        @csrf
        @method('put')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Settings</h3>
        </div>
        <div class="card card-dark card-tabs m-4 ">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab"
                           data-toggle="pill" href="#custom-tabs-one-home"
                           role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">EN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab"
                           data-toggle="pill" href="#custom-tabs-one-profile"
                           role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">UK</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                         aria-labelledby="custom-tabs-one-home-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input class="form-control" name="title[en]" type="text" value="{{ $setting->title->en }}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description[en]" type="text" >{{ $setting->description->en }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">About</label>
                                <textarea class="form-control" name="about[en]" type="text" >{{ $setting->about->en }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input class="form-control" name="title[uk]" type="text" value="{{ $setting->title->uk }}">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description[uk]" type="text" >{{ $setting->description->uk }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">About</label>
                                <textarea class="form-control" name="about[uk]" type="text" >{{ $setting->about->uk }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Facebook</label>
                <input class="form-control" name="facebook" type="text" value="{{ $setting->facebook }}">
            </div>
            <div class="form-group">
                <label for="">Facebook</label>
                <input class="form-control" name="instagram" type="text" value="{{ $setting->instagram }}">
            </div>
        </div>
    </div>
        <x-buttons.save />
    </form>
</x-admin.layout>
