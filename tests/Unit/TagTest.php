<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Blog\Tag;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeTag(): void
    {
        $tag = Tag::factory()->make();

        $this->assertInstanceOf(Tag::class, $tag);
    }

    public function testCreateTag(): void
    {
        $tag = Tag::factory()->create();

        $this->assertDatabaseHas('tags', [
            'slug' => $tag->slug,
            'name' => $tag->name,
        ]);
    }

    public function testTagBelongsToManyPost(): void
    {
        $tag = Tag::factory()->create();

        $this->assertInstanceOf(Collection::class, $tag->posts);
    }
}
