<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\level;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;


use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence();



        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION_ZONA, Course::PUBLICADO, Course::REVISION_CD]),
            'slug' => Str::slug($title),
            'user_id' => $this->faker->randomElement([1,2,3,4,5]),
            'level_id' => level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,
        
        
        ];
    }
}
