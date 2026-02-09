<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'company_name',
                'value' => 'SARL GLOBAL ACCESSOIRES',
                'description' => 'The public name of the company.'
            ],
            [
                'key' => 'company_description',
                'value' => 'Producteur de la marque MYFIX',
                'description' => 'A short description or slogan for the company.'
            ],
            [
                'key' => 'company_address',
                'value' => 'Zone Industrielle - Bordj Bou Arreridid, Algérie',
                'description' => 'The physical address of the company.'
            ],
            [
                'key' => 'company_phone',
                'value' => '+213 550 00 00 00',
                'description' => 'The contact phone number.'
            ],
            [
                'key' => 'company_email',
                'value' => 'commercial@myfix-dz.com',
                'description' => 'The contact email address.'
            ],
            [
                'key' => 'company_logo',
                'value' => null, // Path to logo file
                'description' => 'Path to the company logo image.'
            ],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
