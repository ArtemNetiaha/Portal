<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\AbstractContextAwareMatcher;

class UserController extends Controller
{
    public function feed()
    {
        $settings=Setting::first();
        $authors = auth()->user()->load('authors:id')->authors->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $authors)->paginate(Post::PER_PAGE);
        return view('posts.index', compact(['posts','settings']));
    }

    public function authors()
    {
        $authors = auth()->user()->authors;
        return view('authors.index', compact('authors'));
    }

    public function readers()
    {
        $authors = auth()->user()->readers;
        return view('authors.index', compact('authors'));
    }

    public function posts()
    {
        $settings=Setting::first();
        $posts=Post::where('user_id', auth()->id())->paginate();
        return view('posts.index', compact('posts', 'settings'));

    }

}
