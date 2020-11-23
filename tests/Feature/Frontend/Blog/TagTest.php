<?php

declare(strict_types=1);

namespace Tests\Feature\Frontend\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Blog\{Tag, Post};

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $tag = factory(Tag::class)->create();
        $post = factory(Post::class)->create();

        // $this->assertInstanceOf(Collection::class, $tag->posts);
        $response = $this->get(route('frontend.blog.tags.show', $tag));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertViewIs('frontend.blog.tag.show');
        $response->assertViewHas('currentRouteName');
    }
}
