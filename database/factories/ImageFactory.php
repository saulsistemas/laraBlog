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
            'url'=>'posts/'.$this->faker->image('storage/app/public/posts',640,480,null,true),
            #'url'=>'posts/'.$this->faker->image(storage_path('images'),400,300, null, true),
            
        ];
    }
}
