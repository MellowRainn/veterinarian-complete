<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->paragraph(1),
            'excerpt' => $this->faker->paragraph(5),
            'img_url' => 'http://loremflickr.com/800/600?lock='.
                $this->faker->numberBetween(1, 65535),
            'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(5)).'</p>',
            'published_at' => $this->faker->dateTime
        ];
    }
}
