<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socmeds = [
            [
                'name' => 'whatsapp',
                'link' => 'https://wa.me/6281234567890',
            ],
            [
                'name' => 'instagram',
                'link' => 'https://instagram.com/wildan.mzaki',
            ],
            [
                'name' => 'linkedin',
                'link' => 'https://linkedin.com/in/wildanmzaki',
            ],
            [
                'name' => 'gmail',
                'link' => 'mailto:wildan@vetencode.com',
            ],
        ];

        SocialMedia::insert($socmeds);
    }
}
