<?php

namespace Database\Factories;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
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
            'nominal' => $this->faker->numberBetween(),
            'jangkaWaktu' => $this->faker->randomElement([1, 3, 6, 8, 12]),
            'hasilKeputusan' => $this->faker->boolean(),
            'nasabah_id' => $this->faker->unique()->randomElement($nasabah)
        ];
    }
}
