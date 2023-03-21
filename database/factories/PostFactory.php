<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'image' => 'posts/' /* Lo anterior permite almacenar en bd: posts/image... */ . $this->faker->image('storage/app/posts', 640, 480, null, false), /* Generador de imagenes. Se necesecitan los siguients parámetros (dirección de almacenamiento de imágenes, ancho en píxeles, alto en píxeles, categorías en este caso nullo, almacenamiento ruta con o sin raíz) */
        ];
    }
}
