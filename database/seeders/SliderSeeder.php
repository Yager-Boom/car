<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            ['title' => '傳統手工麵線', 'description' => '百年傳承的手工技藝，堅持品質第一', 'image' => '/images/sliders/slider1.svg', 'link' => null],
            ['title' => '健康養生首選', 'description' => '天然食材製作，營養美味兼具', 'image' => '/images/sliders/slider2.svg', 'link' => null],
            ['title' => '送禮最佳選擇', 'description' => '精美禮盒包裝，表達您的心意', 'image' => '/images/sliders/slider3.svg', 'link' => null],
        ];

        foreach ($sliders as $index => $slider) {
            Slider::create([
                'title' => $slider['title'],
                'description' => $slider['description'],
                'image' => $slider['image'],
                'link' => $slider['link'],
                'active' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
