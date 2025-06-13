<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => $this->faker->unique()->word(),
            'permissions' => json_encode([
                'create' => $this->faker->boolean(),
                'read' => $this->faker->boolean(),
                'update' => $this->faker->boolean(),
                'delete' => $this->faker->boolean(),
            ])
        ];
    }
}
