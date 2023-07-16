<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;
    
    public function testIndexPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('pages.index'));

        $response->assertStatus(200);
        $response->assertViewIs('page.page.index');
        // $response->assertSeeText('Strona główna');
    }

    public function testAboutPage(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('pages.about'));

        $response->assertStatus(200);
        $response->assertViewIs('page.page.about');
        // $response->assertSeeText('O firmie');
    }

    public function testContactPage(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('pages.contacts.create'));

        $response->assertStatus(200);
        $response->assertViewIs('page.contact.create');
        // $response->assertSeeText('Kontakt');
    }

    public function testStoreContact(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('pages.contacts.store'));

        $response->assertStatus(200);
    }
}
