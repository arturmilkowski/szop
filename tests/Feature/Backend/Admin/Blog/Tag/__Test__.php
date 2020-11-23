<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Blog\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
use App\User;
use App\Models\Role;
use App\Models\Blog\Tag;

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
        $response = $this->get(route('backend.admins.blogs.tags.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.tag.index');
        $response->assertSeeText('tagi');
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
        $response = $this->get(route('backend.admins.blogs.tags.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.tag.create');
        $response->assertSeeText('dodawanie tagu');
    }

    /**
     * Store test.
     *
     * @return void
     */
    public function __testStore(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $tag = factory(Tag::class)->make();

        $response = $this->post(
            route('backend.admins.blogs.tags.store', $tag->toArray())
        );

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('backend.admins.blogs.tags.index'));
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
        $tag = factory(Tag::class)->make(['name' => '']);
        $response = $this->post(
            route('backend.admins.blogs.tags.store', $tag->toArray())
        );

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
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
        $tag = factory(Tag::class)->create();
        $response = $this->get(route('backend.admins.blogs.tags.show', $tag));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.tag.show');
        $response->assertSeeText('tag');
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
        $tag = factory(Tag::class)->create();
        $response = $this->get(route('backend.admins.blogs.tags.edit', $tag));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.tag.edit');
        $response->assertSeeText('edycja tagu');
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
        $tag = factory(Tag::class)->create();
        $tag1 = factory(Tag::class)->make();
        $response = $this->put(
            route('backend.admins.blogs.tags.update', $tag),
            $tag1->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.blogs.tags.show', $tag));
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
    public function testUpdateWithNoEffects(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user);
        $tag = factory(Tag::class)->create();
        $response = $this->put(
            route('backend.admins.blogs.tags.update', $tag),
            ['name' => $tag->name] // $tag->toArray()
        );

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.admins.blogs.tags.show', $tag));
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
        $tag = factory(Tag::class)->create();
        $tag1 = factory(Tag::class)->make(['name' => '']);
        $response = $this->put(
            route('backend.admins.blogs.tags.update', $tag),
            $tag1->toArray()
        );

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
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
        $tag = factory(Tag::class)->create();
        // question: yes/no delete
        $response = $this->delete(route('backend.admins.blogs.tags.destroy', $tag));

        $deleteYes = ['delete' => 'Yes'];
        $response = $this->delete(
            route('backend.admins.blogs.tags.destroy', $tag),
            $deleteYes
        );

        $this->assertDeleted($tag);
        $response->assertRedirect(route('backend.admins.blogs.tags.index'));
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
        $tag = factory(Tag::class)->create();
        // question: yes/no delete
        $response = $this->delete(route('backend.admins.blogs.tags.destroy', $tag));
        $response = $this->get(route('backend.admins.blogs.tags.show', $tag));

        $response->assertViewIs('backend.admin.blog.tag.show');
    }
}
