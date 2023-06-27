<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::latest()->get();
        
       
        $days=$events->chunkWhile(function($value, int $key, Collection $chunk) {
    
            return $value->created_at->toDateString() === $chunk->last()->created_at->toDateString();
        });
    
        return view('admin.events.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
    public function deleteDay(Request $request){
        $day=Carbon::create($request->date)->toDateString();
        Event::where ('created_at','like','%'.$day.'%')->delete();
        return to_route('admin.events.index');
    }

    public function truncate()
    {
        DB::table('events')->truncate();
        return to_route('admin.events.index');
    }
}
