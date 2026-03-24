<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ContactSubmission;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function contact_form_can_be_submitted()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test inquiry',
            'message' => 'This is a test message.',
        ];

        $response = $this->post('/contact', $data);
        $response->assertRedirect(); // or assertSee if success message
        $this->assertDatabaseHas('contact_submissions', $data);
    }

    /** @test */
    public function contact_form_requires_valid_email()
    {
        $response = $this->post('/contact', [
            'name' => 'John',
            'email' => 'invalid-email',
            'subject' => 'Test',
            'message' => 'Hello',
        ]);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function contact_form_requires_name_and_message()
    {
        $response = $this->post('/contact', [
            'email' => 'test@example.com',
        ]);
        $response->assertSessionHasErrors(['name', 'message']);
    }
}
