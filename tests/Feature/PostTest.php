<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Blog\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testPostIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('blog.post.index'));

        $response->assertStatus(200);
        $response->assertViewIs('blog.posts.index');
        $response->assertSeeText('Blog');
    }

    public function testPostShow(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();
        $response = $this->get(route('blog.posts.show', $post));

        $response->assertStatus(200);
        $response->assertViewIs('blog.post.show');
        $response->assertSeeText('Wpis');
    }
}
