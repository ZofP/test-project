<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title' => $this->faker->realTextBetween(5, 10),
            'text' => $this->faker->realTextBetween(10, 20),
        ];
    }

    public function existing()
    {
        return $this->state(['user_id' => Auth::id()]);
    }
}
