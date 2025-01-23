<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduledClass>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructore_id' => \App\Modules\User\Models\User::factory(),
            'class_type_id' => \App\Models\ClassType::factory(),
            'date_time' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
