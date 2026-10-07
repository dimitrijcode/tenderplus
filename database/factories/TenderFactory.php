<?php

namespace Database\Factories;

use App\Models\Tender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tender>
 */
class TenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'organization_name' => $this->faker->company(),
            'location' => $this->faker->city(),
            'budget' => $this->faker->randomFloat(2, 1000, 500000),
            'deadline' => $this->faker->dateTimeBetween('now', '+6 months'),
            'source_url' => $this->faker->url(),
            'is_public' => true,
            'status' => 'open',
            'user_id' => User::factory(),
        ];
    }
}
