<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Blog\{Post, Comment};
// use App\Models\User;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeComment(): void
    {
        $comment = Comment::factory()->make();

        $this->assertInstanceOf(Comment::class, $comment);
    }

    public function testCreateComment(): void
    {
        $comment = Comment::factory()
            ->for(Post::factory())
            // ->for(User::factory())
            ->create();

        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertDatabaseHas('comments', ['content' => $comment->content]);
    }

    public function testCommentBelongsToPost(): void
    {
        $comment = Comment::factory()
            ->for(Post::factory())
            // ->for(User::factory())
            ->make();
        $post = $comment->post;

        $this->assertInstanceOf(Post::class, $post);
    }

    // public function testCommentBelongsToUser(): void
    // {
    //     $comment = Comment::factory()
    //         ->for(Post::factory())
    //         ->for(User::factory())
    //         ->make();
    //     $user = $comment->user;

    //     $this->assertInstanceOf(User::class, $user);
    // }

    public function testCommentHasManyReplies(): void
    {
        $comment = Comment::factory()->make();
        $replies = $comment->replies;

        $this->assertInstanceOf(Collection::class, $replies);
    }
}
