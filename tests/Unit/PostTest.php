<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Blog\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testMakePost(): void
    {
        $post = Post::factory()->make();
        $this->assertInstanceOf(Post::class, $post);
    }

    public function testCreatePost(): void
    {
        $post = Post::factory()->create();
        $this->assertInstanceOf(Post::class, $post);
        $this->assertDatabaseHas('posts', ['title' => $post->title]);
    }

    public function testPostHasManyComments(): void
    {
        $post = Post::factory()->make();
        $comments = $post->comments;

        $this->assertInstanceOf(Collection::class, $comments);
    }
}
