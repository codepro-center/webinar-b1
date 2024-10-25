<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'fullname' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('editor'),
        ];

        User::create($user);
    }
}
