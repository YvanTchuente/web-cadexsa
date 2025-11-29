<?php

namespace Tests\Feature;

use App\Mail\InquiryRegistered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InquiryRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_us_page_can_be_rendered(): void
    {
        $response = $this->get(route('contact-us'));

        $response->assertStatus(200);
    }

    public function test_inquiries_can_be_submitted(): void
    {
        Mail::fake();

        $inquiry = [
                'firstname' => 'testfirstname',
                'lastname' => 'testlastname',
                'email' => 'test@example.com',
                'phone' => '123-456-7890',
                'message' => 'testmessage'
            ];

        $this->post(route('contact-us'), $inquiry)
            ->assertRedirect(route('contact-us'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'message' => 'testmessage',
            'author_name' => 'testfirstname testlastname',
            'author_email' => 'test@example.com',
            'author_phone' => '123-456-7890',
        ]);

        Mail::assertSent(InquiryRegistered::class);
    }
}
