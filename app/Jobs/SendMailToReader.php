<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailToReader implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    


    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $title, 
        public int $userId,
        public User $reader
        )
    {
       
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $author= User::find($this->userId);
        $authorName= $author?->name;
       
        Log::channel('message')->info("Job run. Message to  {$this->reader->email} was sent");
        Mail::to($this->reader)->send(new ReaderMail($authorName, $this->title));
    }
}
