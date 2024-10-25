<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'key' => 'about_image',
                'value' => null,
                'type' => 'file',
            ],
            [
                'key' => 'about_title',
                'value' => 'Tentang Saya',
                'type' => 'text',
            ],
            [
                'key' => 'self_description',
                'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, accusamus. Commodi, iusto blanditiis id nam officia enim temporibus ducimus incidunt natus excepturi tempore mollitia odio accusantium, optio dolore, laborum modi?',
                'type' => 'text',
            ],
            [
                'key' => 'self_resume',
                'value' => null,
                'type' => 'file',
            ],
        ];

        Content::insert($contents);
    }
}
