<?php

declare(strict_types=1);

namespace Tests\Unit\Blog\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Models\Blog\{Tag, Post, Comment};
// use Illuminate\Support\Str;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A comment unit test.
     *
     * @return void
     */
    public function testComment(): void
    {
        factory(Comment::class)->make();
        $comments = Comment::all();

        $this->assertInstanceOf(Collection::class, $comments);
    }

    /**
     * A posy belongs to tag unit test.
     *
     * @return void
     */
    public function testCommentBelongsToPost(): void
    {
        $post = factory(Post::class)->create();
        $comment = factory(Comment::class)->make(
            ['post_id' => $post->id]
        );
        $commentPost = $comment->post;

        $this->assertInstanceOf(Post::class, $commentPost);
    }

    /**
     * Post has many replies test.
     *
     * @return void
     */
    public function testPostHasManyReplies(): void
    {
        $comment = factory(Comment::class)->make();
        $replies = $comment->replies;

        $this->assertInstanceOf(Collection::class, $replies);
    }

    /**
     * Create a post unit test.
     *
     * @return void
     */
    public function testCreateComment(): void
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        $comment = factory(Comment::class)->create(['user_id' => $user->id]);
        $post->comments()->save($comment);

        $this->assertDatabaseHas(
            'comments',
            [
                'post_id' => $post->id,
                'user_id' => $user->id,
                'content' => $comment->content,
                'author' => $comment->author,
                'approved' => $comment->approved,
            ]
        );
    }

    /**
     * Delete a post unit test.
     *
     * @return void
     */
    public function testDeleteComment(): void
    {
        $comment = factory(Comment::class)->create();
        $comment->delete();

        $this->assertDeleted($comment);
    }
}
