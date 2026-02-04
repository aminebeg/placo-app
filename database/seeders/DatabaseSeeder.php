<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'MyFix',
            'company' => 'SARL MYFIX',
            'phone' => '+213550000000',
            'email' => 'admin@myfix-dz.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Demo User
        User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Benali',
            'company' => 'Entreprise Générale du Bâtiment',
            'phone' => '+213770123456',
            'email' => 'demo@myfix-dz.com',
            'role' => 'client',
            'password' => Hash::make('demo123'),
        ]);

        $categories = [
            [
                'name_en' => 'Metal Framing',
                'name_fr' => 'Ossature Métallique',
                'name_ar' => 'الهيكل المعدني',
                'slug' => 'metal-framing',
                'products' => [
                    [
                        'name_en' => 'MyFix Metal Studs - Bundle',
                        'name_fr' => 'Montants Métalliques MyFix - Paquet',
                        'name_ar' => 'قوائم معدنية MyFix - حزمة',
                        'description_en' => 'High-quality galvanized steel studs for drywall construction. Professional grade metal framing system.',
                        'description_fr' => 'Montants en acier galvanisé de haute qualité pour construction sèche. Système d\'ossature métallique professionnel.',
                        'description_ar' => 'قوائم فولاذية مجلفنة عالية الجودة لبناء الجدران الجافة. نظام إطار معدني احترافي.',
                        'price' => 8500.00,
                        'weight_kg' => 45.000,
                        'pieces_per_bundle' => 10,
                        'image_url' => '/images/products/myfix-profiles.png',
                        'images' => [
                            '/images/products/profile-shadow-gap.png',
                            '/images/products/cavalier.png',
                        ],
                        'currency' => 'DZD'
                    ],
                ]
            ],
            [
                'name_en' => 'Finishing & Accessories',
                'name_fr' => 'Finition et Accessoires',
                'name_ar' => 'التشطيب والملحقات',
                'slug' => 'finishing-accessories',
                'products' => [
                    [
                        'name_en' => 'Hydro Access Panel 50x50cm',
                        'name_fr' => 'Trappe de Visite Hydro 50x50cm',
                        'name_ar' => 'باب فحص مقاوم للرطوبة 50×50 سم',
                        'description_en' => 'Moisture-resistant access panel for drywall systems. Green hydro finish, includes screws and installation kit.',
                        'description_fr' => 'Trappe de visite résistante à l\'humidité pour systèmes de cloisons sèches. Finition hydro verte, vis et kit d\'installation inclus.',
                        'description_ar' => 'باب فحص مقاوم للرطوبة لأنظمة الجدران الجافة. تشطيب أخضر مقاوم للماء، يشمل البراغي وطقم التركيب.',
                        'price' => 3200.00,
                        'weight_kg' => 1.200,
                        'pieces_per_bundle' => 4,
                        'image_url' => '/images/products/trappe-visite.png',
                        'images' => [
                            '/images/products/cavalier.png',
                        ],
                        'currency' => 'DZD'
                    ],
                    [
                        'name_en' => 'Ceiling Hanger Clip',
                        'name_fr' => 'Cavalier Pivot pour Plafond',
                        'name_ar' => 'مشبك تعليق السقف',
                        'description_en' => 'Galvanized steel pivot hanger for suspended ceiling systems. Heavy-duty construction.',
                        'description_fr' => 'Cavalier pivot en acier galvanisé pour systèmes de plafonds suspendus. Construction robuste.',
                        'description_ar' => 'مشبك محوري من الفولاذ المجلفن لأنظمة الأسقف المعلقة. بناء متين.',
                        'price' => 45.00,
                        'weight_kg' => 0.025,
                        'pieces_per_bundle' => 100,
                        'image_url' => '/images/products/cavalier.png',
                        'currency' => 'DZD'
                    ],
                ]
            ],
            [
                'name_en' => 'Lighting & Decoration',
                'name_fr' => 'Éclairage et Décoration',
                'name_ar' => 'الإضاءة والديكور',
                'slug' => 'lighting-decoration',
                'products' => [
                    [
                        'name_en' => 'Recessed LED Aluminum Profile',
                        'name_fr' => 'Profilé Aluminium LED Encastré',
                        'name_ar' => 'ملف ألومنيوم LED مدمج',
                        'description_en' => 'Aluminum profile for LED strip integration. Perfect for shadow gaps and indirect lighting in false ceilings.',
                        'description_fr' => 'Profilé aluminium pour intégration de rubans LED. Idéal pour gorges lumineuses et éclairage indirect dans faux plafonds.',
                        'description_ar' => 'ملف ألومنيوم لتكامل شريط LED. مثالي للفجوات الظليلة والإضاءة غير المباشرة في الأسقف المستعارة.',
                        'price' => 1850.00,
                        'weight_kg' => 0.350,
                        'pieces_per_bundle' => 1,
                        'image_url' => '/images/products/profile-led.png',
                        'currency' => 'DZD'
                    ],
                    [
                        'name_en' => 'Professional LED Strip 220V',
                        'name_fr' => 'Ruban LED Professionnel 220V',
                        'name_ar' => 'شريط LED احترافي 220 فولت',
                        'description_en' => 'High-brightness LED strip for ambient lighting. 220V plug-and-play, waterproof rating IP65.',
                        'description_fr' => 'Ruban LED haute luminosité pour éclairage d\'ambiance. 220V prêt à l\'emploi, indice d\'étanchéité IP65.',
                        'description_ar' => 'شريط LED عالي السطوع للإضاءة المحيطة. 220 فولت جاهز للاستخدام، تصنيف مقاوم للماء IP65.',
                        'price' => 4500.00,
                        'weight_kg' => 0.450,
                        'pieces_per_bundle' => 1,
                        'image_url' => '/images/products/ruban-led.png',
                        'currency' => 'DZD'
                    ],
                    [
                        'name_en' => 'Shadow Gap Profile',
                        'name_fr' => 'Profilé Joint Creux',
                        'name_ar' => 'ملف الفجوة الظليلة',
                        'description_en' => 'Aluminum shadow gap profile for modern ceiling design. Creates elegant light lines.',
                        'description_fr' => 'Profilé joint creux en aluminium pour design de plafond moderne. Crée des lignes lumineuses élégantes.',
                        'description_ar' => 'ملف فجوة ظليلة من الألومنيوم لتصميم سقف عصري. ينشئ خطوط ضوء أنيقة.',
                        'price' => 1200.00,
                        'weight_kg' => 0.280,
                        'pieces_per_bundle' => 1,
                        'image_url' => '/images/products/profile-shadow-gap.png',
                        'currency' => 'DZD'
                    ],
                ]
            ]
        ];

        foreach ($categories as $catData) {
            $products = $catData['products'];
            unset($catData['products']);
            
            $category = Category::create($catData);
            
            foreach ($products as $prod) {
                Product::create([
                    'name_en' => $prod['name_en'],
                    'name_fr' => $prod['name_fr'] ?? $prod['name_en'],
                    'name_ar' => $prod['name_ar'] ?? $prod['name_en'],
                    'description_en' => $prod['description_en'],
                    'description_fr' => $prod['description_fr'] ?? $prod['description_en'],
                    'description_ar' => $prod['description_ar'] ?? $prod['description_en'],
                    'category_id' => $category->id,
                    'price' => $prod['price'],
                    'currency' => $prod['currency'] ?? 'DZD',
                    'weight_kg' => $prod['weight_kg'],
                    'pieces_per_bundle' => $prod['pieces_per_bundle'],
                    'image_url' => $prod['image_url'],
                    'images' => $prod['images'] ?? null,
                    'in_stock' => true
                ]);
            }
        }
    }
}
