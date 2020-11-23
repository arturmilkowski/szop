<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Blog\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
use App\Models\Blog\Post;

class Test extends CreateSuperAdminTest
{
    use RefreshDatabase;

    /**
     * Index test.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $response = $this->get(route('backend.admins.blogs.posts.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.post.index');
        $response->assertSeeText('wpisy');
    }

    /**
     * Create form test.
     *
     * @return void
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $response = $this->get(route('backend.admins.blogs.posts.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.post.create');
        $response->assertSeeText('dodawanie wpisu');
    }

    /**
     * Store test.
     *
     * @return void
     */
    public function testStore(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $tag = factory(Post::class)->make();

        $response = $this->post(
            route('backend.admins.blogs.posts.store', $tag->toArray())
        );

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('backend.admins.blogs.posts.index'));
        $response->assertSessionHas('alert', 'alert-success');
        $response->assertSessionHas('message', 'dodano');
    }

    /**
     * Store with validation error.
     *
     * @return void
     */
    public function testStoreWithValidationError(): void
    {
        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->make(['title' => '']);
        $response = $this->post(
            route('backend.admins.blogs.posts.store', $post->toArray())
        );

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    /**
     * Show test.
     *
     * @return void
     */
    public function testShow(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        $response = $this->get(route('backend.admins.blogs.posts.show', $post));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.post.show');
        $response->assertSeeText('wpis');
    }

    /**
     * Edit form test.
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        $response = $this->get(route('backend.admins.blogs.posts.edit', $post));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.post.edit');
        $response->assertSeeText('edycja wpisu');
    }

    /**
     * Update test.
     *
     * @return void
     */
    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        $post1 = factory(Post::class)->make();
        $response = $this->put(
            route('backend.admins.blogs.posts.update', $post),
            $post1->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.blogs.posts.show', $post));
        $response->assertSessionHas(
            'alert',
            config('settings.ui.backend.alerts.success')
        );
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.changed')
        );
    }

    /**
     * Update with no changes.
     *
     * @return void
     */
    public function __testUpdateWithNoEffects(): void
    {
        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        // dd($post);
        $response = $this->put(
            route('backend.admins.blogs.posts.update', $post),
            ['title' => $post->title],  // ->toArray()
        );

        // $response->dumpHeaders();
        // $response->dumpSession();
        // $response->dump();

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.blogs.posts.show', $post));
        $response->assertSessionHas(
            'alert',
            config('settings.ui.backend.alerts.warning')
        );
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.not_changed')
        );
    }

    /**
     * Update with validation error.
     *
     * @return void
     */
    public function testUpdateWithErrors(): void
    {
        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        $post1 = factory(Post::class)->make(['title' => '']);
        $response = $this->put(
            route('backend.admins.blogs.posts.update', $post),
            $post1->toArray()
        );

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    /**
     * Delete test.
     *
     * @return void
     */
    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        // question: yes/no delete
        $response = $this->delete(
            route('backend.admins.blogs.posts.destroy', $post)
        );

        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route('backend.admins.blogs.posts.destroy', $post),
            $deleteYes
        );

        $this->assertDeleted($post);
        $response->assertRedirect(route('backend.admins.blogs.posts.index'));
        $response->assertSessionHas(
            'alert',
            config('settings.ui.backend.alerts.success')
        );
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.removed')
        );
    }

    /**
     * Cancel deletion test.
     *
     * @return void
     */
    public function testNoDestroy(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $post = factory(Post::class)->create();
        // question: yes/no delete
        $response = $this->delete(
            route('backend.admins.blogs.posts.destroy', $post)
        );
        $response = $this->get(route('backend.admins.blogs.posts.show', $post));

        $response->assertViewIs('backend.admin.blog.post.show');
    }
}
