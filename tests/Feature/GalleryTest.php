<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GalleryItem;

class GalleryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function gallery_page_loads()
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
        $response->assertSee('Gallery');
    }

    /** @test */
    public function gallery_displays_items()
    {
        GalleryItem::factory()->count(5)->create();
        $response = $this->get('/gallery');
        $response->assertStatus(200);
        // Check that at least one item is shown
        $response->assertSee('Gallery Item'); // assuming title field
    }

    /** @test */
    public function gallery_item_detail_page_loads()
    {
        $item = GalleryItem::factory()->create();
        $response = $this->get("/gallery/{$item->slug}");
        $response->assertStatus(200);
        $response->assertSee($item->title);
    }
}
