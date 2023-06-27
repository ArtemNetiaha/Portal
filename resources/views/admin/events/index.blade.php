<x-admin.layout title="History">
    <div class="timeline">
        @foreach($days as $day)
        <!-- timeline time label -->
        <div class="time-label">
            <span class="bg-red">{{$day->first()->created_at->format('d M Y')}}
                <i class="fas fa-trash mx-2" style="cursor :pointer" onclick="sendForm('deleteDay{{$loop->index}}')"></i></span>
        </div>
        <form action="{{route('admin.events.delete-day')}}" method="post" id="deleteDay{{$loop->index}}">
            @csrf
            @method('delete')
             <input type="hidden" name="date" value="{{$day->first()->created_at}}">
        </form>
        @foreach($day as $event)
        <div class="col-md-6">
            <i class="fas fa-{{$event->icon}} bg-{{$event->color}}"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i>{{$event->created_at->format('Y-m-d H:i')}}</span>
                <h3 class="timeline-header">{{$event->title}}</h3>

                <div class="timeline-body">
                    {{$event->text}}
                </div>
                @if($event->color=="blue")
                <div class="timeline-footer">
                    <a href="{{$event->link}}" class="btn btn-primary btn-sm">Link</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
        @endforeach
        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
        </div>
        <form action="{{route('admin.events.truncate')}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Clear History</button>
        </form>
        </div>
    </div>
</x-admin.layout>
