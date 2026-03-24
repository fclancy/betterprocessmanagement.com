<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GalleryItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleryItem>
 */
class GalleryItemFactory extends Factory
{
    protected $model = GalleryItem::class;

    public function definition(): array
    {
        $title = $this->faker->words(3, true);
        return [
            'title' => $title,
            'slug' => \Str::slug($title),
            'description' => $this->faker->paragraph,
            'image_path' => 'galleries/' . $this->faker->uuid . '.jpg',
            'link_url' => $this->faker->url,
            'order' => $this->faker->numberBetween(0, 100),
            'published' => true,
        ];
    }
}
