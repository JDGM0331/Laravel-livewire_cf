<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('posts'); /* Elimina la carpeta con imágenes para evitar duplicación de estas a la hora de ejecutar el seeder de nuevo */
        Storage::makeDirectory('posts'); /* Crea la carpeta posts en public/storage para evitar error al ejecutar el factory en el generador de imágenes */

        \App\Models\Post::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
