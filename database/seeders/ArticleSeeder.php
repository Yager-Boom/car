<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => '麵線的歷史與文化',
                'content' => '<h2>麵線的起源</h2><p>麵線是中華傳統美食之一，起源於中國福建地區，至今已有數百年的歷史。相傳在明清時期，福建沿海的漁民為了方便保存糧食，發明了麵線這種食品。</p><h2>製作工藝</h2><p>傳統麵線的製作需要經過和麵、醒麵、拉麵、曬麵等多道工序，每一個步驟都需要精準的技巧和豐富的經驗。</p><h2>文化意義</h2><p>在台灣，麵線不僅是一種美食，更承載著深厚的文化意義。生日吃麵線象徵長壽，是重要節日和慶典中不可或缺的食品。</p>',
                'image' => '/images/articles/article1.svg',
            ],
            [
                'title' => '如何挑選優質麵線',
                'content' => '<h2>看外觀</h2><p>優質的麵線色澤均勻，線條細緻整齊，沒有斷裂或結塊的現象。</p><h2>聞氣味</h2><p>好的麵線應該有淡淡的麵香，不應該有酸味或其他異味。</p><h2>試口感</h2><p>煮熟後的麵線應該Q彈有勁，不容易斷裂，吃起來順口不黏牙。</p><h2>看成分</h2><p>選購時要注意查看成分標示，優質麵線使用的原料簡單純粹，不添加過多的添加物。</p>',
                'image' => '/images/articles/article2.svg',
            ],
            [
                'title' => '麵線料理食譜大全',
                'content' => '<h2>蚵仔麵線</h2><p>材料：麵線、新鮮蚵仔、大腸、香菜、蒜泥、烏醋<br>做法：將麵線煮熟後加入燙好的蚵仔和大腸，淋上特製醬汁即可。</p><h2>素食麵線羹</h2><p>材料：麵線、香菇、筍絲、紅蘿蔔、木耳<br>做法：將蔬菜炒香後加入高湯，勾芡後加入麵線煮至入味。</p><h2>麻油麵線</h2><p>材料：麵線、麻油、薑絲、枸杞<br>做法：用麻油爆香薑絲，加水煮滾後放入麵線，最後加入枸杞調味。</p>',
                'image' => '/images/articles/article3.svg',
            ],
            [
                'title' => '麵線的營養價值',
                'content' => '<h2>主要營養成分</h2><p>麵線主要由小麥製成，富含碳水化合物、蛋白質、維生素B群等營養素。</p><h2>健康益處</h2><p>麵線容易消化吸收，適合各個年齡層食用。特別是對於消化功能較弱的老人和小孩，麵線是理想的主食選擇。</p><h2>食用建議</h2><p>搭配蔬菜、肉類或海鮮一起食用，可以使營養更加均衡。建議每餐適量攝取，避免過量造成熱量過高。</p>',
                'image' => '/images/articles/article4.svg',
            ],
            [
                'title' => '傳統手工麵線的製作過程',
                'content' => '<h2>第一步：和麵</h2><p>選用優質麵粉，加入適量的鹽和水，反覆揉搓至麵團光滑有彈性。</p><h2>第二步：醒麵</h2><p>將麵團靜置醒發，讓麵筋充分形成，這是麵線能夠拉得又長又細的關鍵。</p><h2>第三步：拉麵</h2><p>這是最需要技巧的步驟，師傅要將麵團拉成細如髮絲的麵線，需要多年的經驗累積。</p><h2>第四步：曬麵</h2><p>將拉好的麵線懸掛在竹竿上，在陽光下自然風乾，保留最天然的風味。</p>',
                'image' => '/images/articles/article5.svg',
            ],
        ];

        foreach ($articles as $index => $article) {
            Article::create([
                'title' => $article['title'],
                'content' => $article['content'],
                'image' => $article['image'],
                'active' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
