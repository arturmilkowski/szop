<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Blog\Post;

class AdminPostTest extends TestCase
{
    use RefreshDatabase;

    private $item, $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
        $this->item = Post::factory()->for($this->user)->create();
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.blog.posts.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.blog.post.index');
        $response->assertSeeText('Wpisy');
    }


    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.blog.posts.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.blog.post.create');
        $response->assertSeeText('Dodawanie');
    }

    /*
    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        // $user = User::factory()->create();
        // $post = Post::factory()->for($user)->create();
        // dd($post);
        $response = $this->post(route('backend.admins.blog.posts.store', $this->item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', ['title' => $this->item->title]);
    }
    */

    /*
    public function testStoreWithValidationError(): void
    {
        $item = Post::factory()->for($this->user)->create();
        $response = $this->post(route('backend.admins.blog.posts.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['title' => 'The title field is required.']);
        $this->assertDatabaseMissing('posts', ['title' => $this->item->title]);
    }
    */
    /*
    public function testStoreWithDuplicateValidationError(): void
    {
        $item = Concentration::factory()->make();
        $response = $this->post(route('backend.admins.blog.posts.store', $item->toArray()));
        $response = $this->post(route('backend.admins.blog.posts.store', $item->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }
    */


    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.blog.posts.show', $this->item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.blog.post.show');
        $response->assertSeeText('Wpis');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.blog.posts.edit', $this->item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.blog.post.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item1 = Post::factory()->for($this->user)->make();
        $response = $this->put(route('backend.admins.blog.posts.update', $this->item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', ['title' => $item1->title]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item1 = Post::factory()->for($this->user)->make(['title' => '']);
        $response = $this->put(route('backend.admins.blog.posts.update', $this->item), $item1->toArray());
        $response->assertInvalid(['title' => 'The title field is required.']);
        $this->assertDatabaseMissing('posts', ['title' => $item1->title]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->delete(route('backend.admins.blog.posts.destroy', $this->item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('posts', ['title' => $this->item->name]);
    }
}
