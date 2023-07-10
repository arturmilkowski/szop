<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Support\Collection;
// use App\Models\User;
use App\Models\Blog\{Post, Comment, Reply};

class ReplyTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeReply(): void
    {
        $reply = Reply::factory()->make();
        $this->assertInstanceOf(Reply::class, $reply);
    }

    public function testCreateReply(): void
    {
        $comment = Comment::factory()
            ->for(Post::factory())
            // ->for(User::factory())
            ->create();
        $reply = Reply::factory()->for($comment)->create();

        $this->assertInstanceOf(Reply::class, $reply);
        $this->assertDatabaseHas(
            'replies',
            [
                'comment_id' => $comment->id,
                'content' => $reply->content,
            ]
        );
    }

    public function testReplyBelongsToComment(): void
    {
        $comment = Comment::factory()
            ->for(Post::factory())
            // ->for(User::factory())
            ->create();
        $reply = Reply::factory()->for($comment)->create();
        $commentReply = $reply->comment;

        $this->assertInstanceOf(Comment::class, $commentReply);
    }
}
