<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // variabel 'name',
        // 'nim',
        // 'username',
        // 'password',
        // 'dormitory_id',
        // 'gender',
        // 'phone_number',

            'name' => $this->faker->name(),
            'nim' => $this->faker->unique()->numerify('12S22###'),
            'username' => strtolower(str_replace(' ', '-',$this->faker->unique()->userName())),
            'password' => bcrypt('password'),
            'dormitory_id' => $this->faker->numberBetween(1, 4),
            'program_study' => $this->faker->randomElement(['Sistem Informasi', 'Teknik Informatika', 'Teknik Elektro']),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
