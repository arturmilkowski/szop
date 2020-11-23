<?php

declare(strict_types=1);

namespace Tests\Feature\Frontend\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Blog\{Post, Comment};

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Index page test.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();
        // $comment = factory(Comment::class)->make();
        $response = $this->post(
            route('frontend.blog.posts.comments.store', $post),
            [
                'post_id' => $post->id,
                'content' => 'treść komentarza',
                'author' => 'gość',
            ]
        );

        $response->assertRedirect(route('frontend.blog.posts.comments.thank'));
    }

    /**
     * Create comment probably by spam robot.
     *
     * @return void
     */
    public function testCreateBySpamRobot(): void
    {
        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();
        $response = $this->post(
            route('frontend.blog.posts.comments.store', $post),
            [
                'post_id' => $post->id,
                'content' => 'treść komentarza',
                'author' => 'gość',
                'unwanted' => 'on',
            ]
        );

        $response->assertRedirect(route('frontend.pages.index'));
    }
}
