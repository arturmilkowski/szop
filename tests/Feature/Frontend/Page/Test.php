<?php

declare(strict_types=1);

namespace Tests\Feature\Frontend\Page;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Index page test.
     *
     * @return void
     */
    public function testIndexPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.index'));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertSeeText('strona główna');
        // $response->assertSeeInOrder(['index', 'o firmie', 'kontakt']);
        $response->assertViewIs('frontend.page.index');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * About page test.
     *
     * @return void
     */
    public function testAboutPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.about'));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertSeeText('o firmie');
        $response->assertViewIs('frontend.page.about');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * About page test.
     *
     * @return void
     */
    public function testQuestionPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.question'));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertSeeText('pytania i odpowiedzi');
        $response->assertViewIs('frontend.page.question');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Delivery page test.
     *
     * @return void
     */
    public function testDeliveryPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.delivery'));
        $response->assertStatus(200);
        $response->assertSeeText('dostawa');
        $response->assertViewIs('frontend.page.delivery');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Term page test.
     *
     * @return void
     */
    public function testTermPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.term_condition'));
        $response->assertStatus(200);
        $response->assertSeeText('regulamin');
        $response->assertViewIs('frontend.page.term_condition');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Cookie page test.
     *
     * @return void
     */
    public function testCookiePage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.cookie'));
        $response->assertStatus(200);
        $response->assertSeeText('ciastka');
        $response->assertViewIs('frontend.page.cookie');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Privacy policy page test.
     *
     * @return void
     */
    public function testPrivacyPolicyPage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.privacy_policy'));
        $response->assertStatus(200);
        $response->assertSeeText('polityka prywatności');
        $response->assertViewIs('frontend.page.privacy_policy');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Contact page test.
     *
     * @return void
     */
    public function testContactCreatePage(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.contacts.create'));
        $response->assertStatus(200);
        // $response->assertSee('__invoke');
        $response->assertSeeText('kontakt');
        $response->assertViewIs('frontend.page.contact.create');
        $response->assertViewHas('currentRouteName');
    }

    /**
     * Send email from contact page.
     *
     * @return void
     */
    public function testContactStoreEmail(): void
    {
        // $this->withoutExceptionHandling();

        $email = [
            'subject' => 'Mail subject',
            'content' => 'Mail content',
            'email' => 'some-mail@tlen.pl'
        ];
        $response = $this->post(route('frontend.pages.contacts.store'), $email);
        $response->assertStatus(302);
        $response->assertRedirect(route('frontend.pages.contacts.thank'));
    }

    /**
     * Contact thank page test.
     *
     * @return void
     */
    public function testContactThankPageWithoutSendingMail(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('frontend.pages.contacts.thank'));
        $response->assertStatus(302);
        $response->assertRedirect(route('frontend.pages.index'));
    }
}
