<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Post;
use App\Jobs\SendMailToReader;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $readers = auth()->user()?->readers;
        if($readers)
        foreach ($readers as $reader) {
            Log::channel('message')->info('Dispatch job mail to '. $reader->name);
            SendMailToReader::dispatch( $post->title,$post->user_id,$reader);
        }
        $user=auth()->user();
        Event::create([
            'title'=>"$user?->name create post '$post->title'",
            'text'=>"$post->description",
            'link'=>request()->getSchemeAndHttpHost().'/posts/'.$post->slug,
            'icon'=>'plus',
            'color'=>'blue',
            'created_at'=>$post->created_at
        ]);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $user=auth()->user();
        Event::create([
            'title'=>"$user?->name delete post '$post->title'",
            'text'=>"$post->description",
            'link'=>request()->getSchemeAndHttpHost().'/posts/'.$post->slug,
            'icon'=>'trash',
            'color'=>'red',
            'created_at'=>$post->created_at
        ]);
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
