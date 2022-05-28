<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //almacena la direccion de la imagen que se descargo, lo hace con el metodo image()
            //la ruta donde se guarda la imagen es: public/storage/posts  esto realmente esta en Storage/app/public/posts
            'url'=>'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)
            //640 alto
            //480 ancho
            //null sin categoria
            //true public/storage/posts/imgage.jpg
            //false devuelve nombre  imagage.jpg

        ];
    }
}
