<?php

declare(strict_types=1);

namespace Tests\Unit\Blog\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Models\Blog\{Tag, Post};
use Illuminate\Support\Str;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * A post unit test.
     *
     * @return void
     */
    public function testPost(): void
    {
        factory(Post::class)->make();
        $posts = Post::all();

        $this->assertInstanceOf(Collection::class, $posts);
    }

    public function __testPostBelongsToUser(): void
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->make(
            ['user_id' => $user->id]
        );
        $userPost = $post->user;

        $this->assertInstanceOf(User::class, $userPost);
    }

    /**
     * A post belongs to tag unit test.
     *
     * @return void
     */
    public function __testPostBelongsToTag(): void
    {
        $tag = factory(Tag::class)->create();
        $post = factory(Post::class)->make(
            ['tag_id' => $tag->id]
        );
        $postTag = $post->tag;

        $this->assertInstanceOf(Tag::class, $postTag);
    }

    public function testPostHasManyComments(): void
    {
        $post = factory(Post::class)->make();
        $comments = $post->comments;

        $this->assertInstanceOf(Collection::class, $comments);
    }

    /**
     * Create a post unit test.
     *
     * @return void
     */
    public function testCreatePost(): void
    {
        // $user = factory(User::class)->create(['role_id' => 1]);
        // dd($user);
        $post = factory(Post::class)->create();

        $this->assertDatabaseHas(
            'posts',
            [
                // 'user_id' => 1,
                // 'tag_id' => $post->tag->id,
                'slug' => Str::slug($post->title, '-'),
                'title' => $post->title,
                'intro' => $post->intro,
                'content' => $post->content,
                'img' => $post->img,
                'site_description' => $post->site_description,
                'site_keyword' => $post->site_keyword,
                // 'approved' => $post->approved,
                // 'published' => $post->published,
            ]
        );
    }

    /**
     * Delete a post unit test.
     *
     * @return void
     */
    public function testDeletePost(): void
    {
        $post = factory(Post::class)->create();
        $post->delete();

        $this->assertDeleted($post);
    }
}
