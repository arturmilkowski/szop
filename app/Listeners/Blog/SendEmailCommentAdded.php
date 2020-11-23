<?php

namespace App\Listeners\Blog;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\Blog\CommentAdded as CommentAddedMail;
use App\Events\CommentAdded;
use App\Models\Blog\Comment;

class SendEmailCommentAdded
{
    public $comment;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Handle the event.
     *
     * @param CommentAdded $event CommentAdded
     * 
     * @return void
     */
    public function handle(CommentAdded $event): void
    {
        Mail::to(config('mail.from.address'))
            ->send(new CommentAddedMail($event->comment));
    }
}
