<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Models\ImageType;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imageTypes=ImageType::orderBy('sort')->with('images')->get();  
        return view('admin.images.index', compact('imageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $imageTypes=ImageType::orderBy('sort')->get();
       return view('admin.images.create', compact('imageTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $imageTypeId=$request->image_type_id;
        $newImages=[];
    foreach($request->file('images')??[] as $image ){
        $filename = rand(1000000000, 9999999999) . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('galery', $image, $filename);
            $newImages[] = ['path' => "storage/galery/$filename",
            'image_type_id'=>$imageTypeId
        ];
        }
        Image::insert($newImages);
        return to_route('admin.image.index');
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
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
