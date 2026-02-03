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
            'last_name' => 'User',
            'company' => 'Placo HQ',
            'phone' => '0000000000',
            'email' => 'admin@placo.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Demo User
        User::create([
            'first_name' => 'Demo',
            'last_name' => 'Client',
            'company' => 'SmartBuild Construction',
            'phone' => '0770123456',
            'email' => 'demo@placo.com',
            'role' => 'client',
            'password' => Hash::make('demo123'),
        ]);

        $categories = [
            [
                'name_en' => 'Studs & Tracks',
                'name_fr' => 'Montants et Rails',
                'name_ar' => 'الأعمدة والقواعد',
                'slug' => 'studs-tracks',
                'products' => [
                    [
                        'name_en' => 'C-Stud 70mm x 3000mm',
                        'name_fr' => 'Montant C 70mm x 3000mm',
                        'name_ar' => 'قائم C 70 مم × 3000 مم',
                        'description_en' => 'Galvanized steel C-section stud for partition wall framing. 0.55mm gauge.',
                        'price' => 650.00,
                        'weight_kg' => 1.850,
                        'pieces_per_bundle' => 12,
                        'tech_url' => 'https://www.metsec.com/wp-content/uploads/2019/08/Metsec-Internal-Partition-Systems.pdf'
                    ],
                    [
                        'name_en' => 'U-Track 72mm x 3000mm',
                        'name_fr' => 'Rail U 72mm x 3000mm',
                        'name_ar' => 'قاعدة U 72 مم × 3000 مم',
                        'description_en' => 'Standard floor and ceiling track for 70mm studs. Galvanized finish.',
                        'price' => 520.00,
                        'weight_kg' => 1.620,
                        'pieces_per_bundle' => 10,
                        'tech_url' => 'https://www.metsec.com/wp-content/uploads/2019/08/Metsec-Internal-Partition-Systems.pdf'
                    ]
                ]
            ],
            [
                'name_en' => 'Ceiling Systems',
                'name_fr' => 'Systèmes de Plafond',
                'name_ar' => 'أنظمة الأسقف',
                'slug' => 'ceiling-systems',
                'products' => [
                    [
                        'name_en' => 'T-Grid Main Runner 3600mm',
                        'name_fr' => 'Profilé T Porteur 3600mm',
                        'name_ar' => 'حامل رئيسي T-Grid 3600 مم',
                        'description_en' => 'Fire-rated main runner for suspended ceiling systems. White finish.',
                        'price' => 1850.00,
                        'weight_kg' => 0.950,
                        'pieces_per_bundle' => 20,
                        'tech_url' => 'https://www.rockfon.com/globalassets/downloads/product-datasheets/rockfon-chicago-metallic-t24-hook-system.pdf'
                    ]
                ]
            ],
            [
                'name_en' => 'Fixings & Finishing',
                'name_fr' => 'Fixations et Finition',
                'name_ar' => 'التثبيت والتشطيب',
                'slug' => 'fixings-finishing',
                'products' => [
                    [
                        'name_en' => 'Drywall Screws 3.5x25mm (Box 1000)',
                        'name_fr' => 'Vis Placo 3.5x25mm (Boîte 1000)',
                        'name_ar' => 'براغي دريوال 3.5 × 25 مم (علبة 1000)',
                        'description_en' => 'Black phosphate coated screws for fixing plasterboard to metal studs.',
                        'price' => 2400.00,
                        'weight_kg' => 1.400,
                        'pieces_per_bundle' => 1,
                        'tech_url' => 'https://www.hilti.com/medias/sys_master/documents/h3e/h8e/9491717201950/Technical-data-leaflet-for-S-DS-drywall-screws-Technical-information-ASSET-DOC-1335029.pdf'
                    ]
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
                    'weight_kg' => $prod['weight_kg'],
                    'pieces_per_bundle' => $prod['pieces_per_bundle'],
                    'technical_sheet_url' => $prod['tech_url'],
                    'in_stock' => true
                ]);
            }
        }
    }
}
