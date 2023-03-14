<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ceremony>
 */
class CeremonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake('ms_MY')->name(),
            'description' => fake('ms_MY')->text($maxNbChars = 15),
            'avatar' => fake('ms_MY')->imageUrl(),
            'start_date' => fake('ms_MY')->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => fake('ms_MY')->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
