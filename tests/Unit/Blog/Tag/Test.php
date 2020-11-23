<?php

declare(strict_types=1);

namespace Tests\Unit\Blog\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Blog\Tag;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A tag unit test.
     *
     * @return void
     */
    public function testTag(): void
    {
        factory(Tag::class)->make();
        $tags = Tag::all();

        $this->assertInstanceOf(Collection::class, $tags);
    }

    /**
     * A tag has many posts unit test.
     *
     * @return void
     */
    public function testTagHasManyPosts(): void
    {
        $tag = factory(Tag::class)->make();
        $posts = $tag->posts;

        $this->assertInstanceOf(Collection::class, $posts);
    }

    /**
     * Create a tag unit test.
     *
     * @return void
     */
    public function testCreateTag(): void
    {
        $tag = factory(Tag::class)->create();

        $this->assertDatabaseHas(
            'tags',
            [
                'name' => $tag->name,
            ]
        );
    }

    /**
     * Delete a tag unit test.
     *
     * @return void
     */
    public function testDeleteTag(): void
    {
        $tag = factory(Tag::class)->create();
        $tag->delete();

        $this->assertDeleted($tag);
    }
}
