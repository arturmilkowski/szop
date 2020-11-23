<?php

declare(strict_types=1);

namespace Tests\Feature\Frontend\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Blog\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Index page test.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.blog.posts.index'));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertSeeText('blog');
        $response->assertViewIs('frontend.blog.post.index');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Show post.
     *
     * @return void
     */
    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $post = factory(Post::class)->create();
        $response = $this->get(route('frontend.blog.posts.show', $post));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        // $response->assertSeeText('blog');
        // $response->assertSeeInOrder(['index', 'o firmie', 'kontakt']);
        $response->assertViewIs('frontend.blog.post.show');
        $response->assertViewHas('currentRouteName');
    }

    public function __testShow404(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.blog.posts.show', ['slug' => 'wrong-slug']));
        $response->assertStatus(404);
    }
}
