<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['title' => '傳統手工麵線', 'description' => '採用傳統手工製作技法，麵線Q彈順口，保留古早味的美好滋味。適合製作麵線羹、乾麵線等各式料理。', 'price' => 120, 'image' => '/images/products/product1.svg'],
            ['title' => '紅麵線', 'description' => '加入紅麴製作的健康麵線，色澤紅潤，口感滑順，營養豐富，是送禮自用兩相宜的好選擇。', 'price' => 150, 'image' => '/images/products/product2.svg'],
            ['title' => '蚵仔麵線', 'description' => '內含新鮮蚵仔的即食麵線，只需簡單加熱即可享用，方便快速，美味可口。', 'price' => 180, 'image' => '/images/products/product3.svg'],
            ['title' => '素食麵線', 'description' => '純素配方製作，不含任何動物性成分，適合素食者食用，健康營養又美味。', 'price' => 130, 'image' => '/images/products/product4.svg'],
            ['title' => '細麵線', 'description' => '超細口感的麵線，容易入口，特別適合老人和小孩食用，煮食時間短，快速方便。', 'price' => 110, 'image' => '/images/products/product5.svg'],
            ['title' => '粗麵線', 'description' => '口感紮實的粗麵線，耐煮不爛，適合製作各式湯麵、炒麵等料理，飽足感十足。', 'price' => 115, 'image' => '/images/products/product6.svg'],
            ['title' => '黑麵線', 'description' => '添加竹炭粉製作的健康黑麵線，具有排毒養生功效，口感Q彈，是養生族的最愛。', 'price' => 160, 'image' => '/images/products/product7.svg'],
            ['title' => '有機麵線', 'description' => '使用100%有機小麥製作，無農藥殘留，安全健康，讓您吃得安心又放心。', 'price' => 200, 'image' => '/images/products/product8.svg'],
            ['title' => '雞蛋麵線', 'description' => '添加新鮮雞蛋製作，營養加倍，色澤金黃，口感香滑，是孩童成長的最佳選擇。', 'price' => 140, 'image' => '/images/products/product9.svg'],
            ['title' => '麵線禮盒組', 'description' => '精選多種口味麵線組合，精美禮盒包裝，送禮體面大方，是逢年過節的最佳伴手禮。', 'price' => 500, 'image' => '/images/products/product10.svg'],
            ['title' => '即食麵線杯', 'description' => '隨身攜帶的即食麵線杯，只需加入熱水即可享用，是上班族、學生的最佳選擇。', 'price' => 50, 'image' => '/images/products/product11.svg'],
            ['title' => '麻油麵線', 'description' => '添加優質麻油調味的麵線，香氣四溢，適合產後補身，溫補養生的絕佳選擇。', 'price' => 170, 'image' => '/images/products/product12.svg'],
            ['title' => '蔬菜麵線', 'description' => '加入多種蔬菜粉末製作，營養均衡，色彩繽紛，讓孩子愛上吃蔬菜。', 'price' => 135, 'image' => '/images/products/product13.svg'],
            ['title' => '薑黃麵線', 'description' => '添加薑黃粉製作的養生麵線，具有抗氧化功效，色澤金黃，健康美味。', 'price' => 155, 'image' => '/images/products/product14.svg'],
            ['title' => '全麥麵線', 'description' => '使用全麥麵粉製作，保留完整的麥麩和胚芽，膳食纖維豐富，促進腸道健康。', 'price' => 145, 'image' => '/images/products/product15.svg'],
            ['title' => '無鹽麵線', 'description' => '專為需要低鈉飲食者設計的無鹽麵線，口感依然美味，健康無負擔。', 'price' => 125, 'image' => '/images/products/product16.svg'],
            ['title' => '辣味麵線', 'description' => '添加天然辣椒調味的麵線，香辣夠味，刺激味蕾，是嗜辣者的最愛。', 'price' => 140, 'image' => '/images/products/product17.svg'],
            ['title' => '麵線醬料組', 'description' => '搭配麵線的專用醬料組合，包含多種口味醬料，讓您在家也能輕鬆做出美味麵線料理。', 'price' => 280, 'image' => '/images/products/product18.svg'],
        ];

        foreach ($products as $index => $product) {
            Product::create([
                'title' => $product['title'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'active' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
