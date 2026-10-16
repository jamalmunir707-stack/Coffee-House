<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $coffee = Category::firstOrCreate(['slug' => 'coffee'], [
            'name' => 'القهوة المختصة',
            'is_active' => true,
            'sort_order' => 1
        ]);

        $cold = Category::firstOrCreate(['slug' => 'cold-drinks'], [
            'name' => 'المشروبات الباردة',
            'is_active' => true,
            'sort_order' => 2
        ]);

        $dessert = Category::firstOrCreate(['slug' => 'desserts'], [
            'name' => 'الحلويات والمخبوزات',
            'is_active' => true,
            'sort_order' => 3
        ]);

        $products = [
            [
                'category' => $cold,
                'name' => 'سبانش لاتيه فاخر (Spanish Latte)',
                'slug' => 'spanish-latte',
                'description' => 'سبانش لاتيه مثلج ومحضر من أجود أنواع الحليب المكثف المحلى مع الإسبريسو المركز ورشة من القرفة السيلانية.',
                'price' => 4.50,
                'cost_price' => 1.80,
                'image' => 'products/spanish-latte.jpg',
                'featured' => true
            ],
            [
                'category' => $coffee,
                'name' => 'فلات وايت مختص (Specialty Flat White)',
                'slug' => 'flat-white',
                'description' => 'فلات وايت كلاسيكي برغوة ميكروفوم حريرية متقنة تطفو فوق طبقة غنية من الكريمة الذهبية المحضرة من محصول البن الإثيوبي الفاخر.',
                'price' => 3.75,
                'cost_price' => 1.40,
                'image' => 'products/flat-white.jpg',
                'featured' => true
            ],
            [
                'category' => $coffee,
                'name' => 'موكا الشوكولاتة الداكنة (Luxury Dark Mocha)',
                'slug' => 'luxury-mocha',
                'description' => 'مزيج ساحر من الشوكولاتة البلجيكية الذائبة مع الإسبريسو الطازج، مغطى بالكريمة المخفوقة الفاخرة ورقائق الكاكاو الداكن.',
                'price' => 4.25,
                'cost_price' => 1.70,
                'image' => 'products/mocha.jpg',
                'featured' => true
            ],
            [
                'category' => $coffee,
                'name' => 'لاتيه كلاسيك (Classic Latte)',
                'slug' => 'latte',
                'description' => 'إسبريسو متوازن مع الحليب المبخر بدرجة حرارة مثالية.',
                'price' => 3.50,
                'cost_price' => 1.20,
                'image' => 'products/flat-white.jpg',
                'featured' => true
            ],
            [
                'category' => $cold,
                'name' => 'آيس لاتيه (Iced Latte)',
                'slug' => 'iced-latte',
                'description' => 'إسبريسو بارد مع الحليب الطازج ومكعبات الثلج النقية.',
                'price' => 4.00,
                'cost_price' => 1.30,
                'image' => 'products/spanish-latte.jpg',
                'featured' => false
            ],
            [
                'category' => $coffee,
                'name' => 'كابتشينو إيطالي (Italian Cappuccino)',
                'slug' => 'cappuccino',
                'description' => 'قهوة إيطالية تقليدية بنسب متساوية من الإسبريسو والحليب والرغوة الغنية الكثيفة.',
                'price' => 3.25,
                'cost_price' => 1.10,
                'image' => null,
                'featured' => false
            ],
            [
                'category' => $coffee,
                'name' => 'أمريكانو (Americano)',
                'slug' => 'americano',
                'description' => 'جرعة مزدوجة من الإسبريسو الغني مخفف بالماء الساخن بنكهة عميقة وواضحة.',
                'price' => 2.75,
                'cost_price' => 0.80,
                'image' => null,
                'featured' => false
            ],
            [
                'category' => $dessert,
                'name' => 'كرواسون الزبدة الطازج (Butter Croissant)',
                'slug' => 'croissant',
                'description' => 'كرواسون فرنسي هش ومقرمش مخبوز يومياً بأجود أنواع الزبدة الطبيعية.',
                'price' => 2.50,
                'cost_price' => 0.90,
                'image' => null,
                'featured' => false
            ]
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'category_id' => $item['category']->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'cost_price' => $item['cost_price'],
                    'image' => $item['image'],
                    'is_available' => true,
                    'is_featured' => $item['featured']
                ]
            );
        }
    }
}
