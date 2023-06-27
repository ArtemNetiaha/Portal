<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(User $user)
    {
        $user->readers()->attach(auth()->id());
        return response()->json(['status'=>'success']);
    }

    public function unsubscribe(User $user)
    {
        $user->readers()->detach(auth()->id());
        return response()->json(['status'=>'success']);
    }
}
