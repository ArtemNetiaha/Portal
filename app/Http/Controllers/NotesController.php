<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorenotesRequest;
use App\Http\Requests\UpdatenotesRequest;
use App\Models\notes;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorenotesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenotesRequest $request, notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notes $notes)
    {
        //
    }
}
