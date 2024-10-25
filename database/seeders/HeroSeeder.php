<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'key' => 'name',
                'value' => 'Wildan M Zaki',
                'type' => 'text',
            ],
            [
                'key' => 'profesion',
                'value' => 'Full Stack Developer',
                'type' => 'text',
            ],
            [
                'key' => 'hero_text',
                'value' => 'Halo, saya {name}, seorang {profesion}',
                'type' => 'text',
            ],
            [
                'key' => 'hero_image',
                'value' => null,
                'type' => 'file',
            ],
            [
                'key' => 'wa_link',
                'value' => 'https://wa.me/6281234567890?text=Halo',
                'type' => 'text',
            ],
        ];

        Content::insert($contents);
    }
}
