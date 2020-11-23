<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Blog\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
use App\Models\Blog\Comment;

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
        $response = $this->get(route('backend.admins.blogs.comments.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.comment.index');
        $response->assertSeeText('komentarze do wpisów');
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
        $comment = factory(Comment::class)->create();
        $response = $this->get(
            route(
                'backend.admins.blogs.comments.show',
                $comment
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.comment.show');
        $response->assertSeeText('komentarz do wpisu');
    }

    /**
     * Edit form.
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $comment = factory(Comment::class)->create();
        $response = $this->get(
            route(
                'backend.admins.blogs.comments.edit',
                $comment
            )
        );

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.comment.edit');
        $response->assertSeeText('edycja komentarza');
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
        $comment = factory(Comment::class)->create();
        $comment1 = factory(Comment::class)->make();
        $response = $this->put(
            route('backend.admins.blogs.comments.update', $comment),
            $comment1->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(
            route(
                'backend.admins.blogs.comments.show',
                $comment
            )
        );
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
    public function testUpdateWithTheSameData(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $comment = factory(Comment::class)->create();
        $comment1 = $comment;
        $response = $this->put(
            route('backend.admins.blogs.comments.update', $comment),
            $comment1->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(
            route(
                'backend.admins.blogs.comments.show',
                $comment
            )
        );
        $response->assertSessionHas(
            'alert',
            config('settings.ui.backend.alerts.warning')
        );
        $response->assertSessionHas(
            'message',
            config('settings.ui.backend.messages.no_changed')
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
        $comment = factory(Comment::class)->create();
        $comment1 = factory(comment::class)->make(['content' => '']);
        $response = $this->put(
            route('backend.admins.blogs.comments.update', $comment),
            $comment1->toArray()
        );

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['content']);
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
        $comment = factory(Comment::class)->create();
        // question: yes/no delete
        $response = $this->delete(
            route('backend.admins.blogs.comments.destroy', $comment)
        );


        $response = $this->delete(
            route('backend.admins.blogs.comments.destroy', $comment),
            ['delete' => 'Yes']
        );

        $this->assertDeleted($comment);
        $response->assertRedirect(route('backend.admins.blogs.comments.index'));
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
        $comment = factory(Comment::class)->create();
        // question: yes/no delete
        $response = $this->delete(
            route('backend.admins.blogs.comments.destroy', $comment)
        );
        $response = $this->get(
            route(
                'backend.admins.blogs.comments.show',
                $comment
            )
        );

        $response->assertViewIs('backend.admin.blog.comment.show');
    }
}
