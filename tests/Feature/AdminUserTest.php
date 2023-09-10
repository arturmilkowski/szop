<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.users.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.user.index');
        $response->assertSeeText('Użytkownicy sklepu');
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.users.show', $this->user));
        $response->assertOk();
        $response->assertViewIs('backend.admin.user.show');
        $response->assertSeeText('Użytkownik sklepu');
    }
}
