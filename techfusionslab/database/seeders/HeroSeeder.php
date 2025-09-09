<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// ✅ Import the Hero model
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if a hero already exists to avoid duplicates
        if (Hero::count() == 0) {
            Hero::create([
                'title' => 'EMPOWERING YOUR FINANCIAL CONFIDENCE',
                'highlight' => 'CONFIDENCE',
                'description' => 'Based in Harrow, London, Modern Trading and Services LLP provides tailored financial and business solutions for SMEs, delivering expert guidance and trusted support to help your business grow with confidence.',
                'button_text' => 'FREE CONSULTATION',
                'button_link' => '/contact',
                'main_image' => 'frontend/assets/img/home-1/hero/hero-1.jpg',
                'bg_image' => 'frontend/assets/img/home-1/hero/hero-1-bg.jpg',
                'map_image' => 'frontend/assets/img/home-1/hero/map.png',
            ]);
        }
    }
}
