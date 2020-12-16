<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
            'avatar' => $this->faker->word,
            'birthday' => $this->faker->word,
            'fb_url' => $this->faker->url,
            'fb_page_url' => $this->faker->url,
            'facebook_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
