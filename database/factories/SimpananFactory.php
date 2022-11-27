<?php

namespace Database\Factories;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Simpanan>
 */
class SimpananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nasabah = Nasabah::all('id');

        return [
            'saldo' => $this->faker->numberBetween(),
            'nasabah_id' => $this->faker->unique()->randomElement($nasabah)
        ];
    }
}
