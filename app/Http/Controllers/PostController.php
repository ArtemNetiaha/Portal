<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Jobs\SendMailToReader;
use App\Models\Block;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function index(FilterRequest $request)
    {

    $settings=Setting::first()?->getByLocale();
        $posts = Post::latest()->where('show', 1)->with('category', 'user:id,name')
            ->withCount ('reactions as likes', 'commentsCount as commentNumber')
            ->dateFilter($request->data)
            ->category($request->category)->tag($request->tag)
            ->search($request->q)->paginate(Post::PER_PAGE)->withQueryString();

        return view('posts.index', compact(['posts','settings']));
    }

    public function create()
    {
        $settings=Setting::first();
        return view('posts.create', compact(['settings']));
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);
        $settings = Setting::first();
        $post->load('category:id,title', 'tags:id,title', 'user', 'comments.user', 'comments.comments', 'blocks')
             ->loadCount('reactions as likes', 'commentsCount as commentsNumber');

        $post->blocks?->each(function ($block){
            $block->content = json_decode($block->content);
            $block->blocks?->each(function ($block){
                $block->content = json_decode($block->content);
                
            });
           
        });
        // dd($post->blocks);

        return view('posts.show', compact(['post', 'settings']));
    }


    public function store(StorePostRequest $request)
    {
        $fields = $request->validated();
        $fields+=Post::uploadImage($request->file('image'));
        $post = Post::create($fields);$post->tags()->attach($request->tags);

        return to_route('posts.edit', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $settings=Setting::first();
        $post->load('category', 'tags','blocks.blocks');
        $post->blocks?->each(function ($block){
            $block->content=json_decode($block->content);
            $block->blocks?->each(function ($block){
                $block->content=json_decode($block->content);
            });
        });
        return view('posts.edit',  compact(['post','settings']));
    }

    public function update(Post $post, UpdatePostRequest $request)
    {

        $this->authorize('update', $post);
        $fields = $request->validated();

        $image=Post::uploadImage($request->file('image'));
        if($image){
            $fields+=$image;
            $post->deleteImage();
        }


        $post->update($fields);
        $post->tags()->detach();
        $post->tags()->attach($request->tags);
        Block::massUpdate($request->blocks,$request->file('blocks'));

        return to_route('posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->deleteImage();

        $post->delete();
        return to_route('posts.index');
    }
    public function addBlock(Post $post){
        $blocks=['text','image','review','quote', 'faq'];

        return view('posts.add-block', compact('post','blocks'));

    }

    public function storeBlock(Post $post, Request $request)
    {
        $post->blocks()->create([
            'type'=>$request->type,
        ]);
       
       
        return to_route('posts.edit', compact('post'));

    }
}
