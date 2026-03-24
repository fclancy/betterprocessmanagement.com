<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user for Fortify/Filament
        User::factory()->create([
            'email' => 'admin@betterprocessmanagement.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true, // you'll need this column or use role system
        ]);

        // Seed some gallery items
        GalleryItem::factory()->count(10)->create();
    }
}
