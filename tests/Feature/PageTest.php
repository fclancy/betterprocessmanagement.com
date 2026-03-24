<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Better Process Management');
    }

    /** @test */
    public function services_page_loads()
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Our Services');
    }

    /** @test */
    public function about_us_page_loads()
    {
        $response = $this->get('/aboutus');
        $response->assertStatus(200);
        $response->assertSee('Experience');
    }

    /** @test */
    public function contact_us_page_loads()
    {
        $response = $this->get('/contactus');
        $response->assertStatus(200);
        $response->assertSee('Contact Us');
    }
}
