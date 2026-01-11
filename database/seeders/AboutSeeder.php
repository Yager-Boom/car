<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'title' => '關於我們',
            'content' => '<h2>公司簡介</h2><p>我們是一家擁有50年歷史的傳統麵線製造商，堅持使用最優質的原料和傳統的手工製作技法，為顧客提供最美味、最健康的麵線產品。</p><h2>我們的理念</h2><p>「品質第一，顧客至上」是我們一貫的經營理念。我們相信，只有用心製作的產品，才能贏得顧客的信賴和支持。</p><h2>產品特色</h2><ul><li>堅持傳統手工製作</li><li>嚴選優質天然原料</li><li>不添加防腐劑和人工色素</li><li>通過食品安全認證</li><li>多樣化的產品選擇</li></ul><h2>企業責任</h2><p>我們深知企業的社會責任，不僅致力於提供優質產品，更關注環境保護和社會公益。我們使用環保包裝材料，減少對環境的影響，並定期參與公益活動，回饋社會。</p><h2>聯絡我們</h2><p>地址：台灣台北市○○區○○路○○號<br>電話：(02) 1234-5678<br>營業時間：週一至週五 09:00-18:00<br>Email: info@mianxian-shop.com</p>',
            'image' => '/images/about/about.svg',
        ]);
    }
}
