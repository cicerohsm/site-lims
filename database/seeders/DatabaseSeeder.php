<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@lims.ifpi.edu.br'],
            [
                'name' => 'Administrador LIMS',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        $categories = ['Pesquisa', 'Extensão', 'Notícias', 'Eventos', 'Projetos'];

        foreach ($categories as $name) {
            PostCategory::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
