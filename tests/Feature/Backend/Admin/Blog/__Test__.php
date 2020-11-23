<?php

declare(strict_types=1);

namespace Tests\Feature\Backend\Admin\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Backend\Admin\CreateSuperAdminTest;
// use App\Models\Blog\Post;

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
        $response = $this->get(route('backend.admins.blogs.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.blog.index');
        // $response->assertSeeText('tagi');
    }
}
