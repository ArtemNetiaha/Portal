<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageTypeRequest;
use App\Http\Requests\UpdateImageTypeRequest;

class ImageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imageTypes=ImageType::orderBy('sort')->get();
        return view('admin.image-types.index', compact('imageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.image-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageTypeRequest $request)
    {
        ImageType::create($request->validated());
        return to_route('admin.imagetypes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImageType $imagetype)
    {
       return view('admin.image-types.edit', compact('imagetype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageTypeRequest $request, ImageType $imagetype)
    {
        $imagetype->update($request->validated());
        return to_route('admin.imagetypes.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageType $imagetype)
    {
        $imagetype->delete();
        return to_route('admin.imagetypes.index');
    }
}
