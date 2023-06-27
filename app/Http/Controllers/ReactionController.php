<?php

namespace App\Http\Controllers;

use App\Models\Post;



class ReactionController extends Controller
{
   public function store(Post $post)
   {

    $post->reactions()->attach(auth()->id());

       return response()->json(['status'=>'success']);
   }
   public function destroy(Post $post)
   {
    $post->reactions()->detach(auth()->id());
       return response()->json(['status'=>'success']);
   }
}
