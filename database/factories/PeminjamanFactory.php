<?php

namespace Database\Factories;

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
        return [
            'nominal' => $this->faker->numberBetween(),
            'tanggalPengajuan' => $this->faker->dateTime(),
            'jangkaWaktu' => $this->faker->numberBetween(1, 24),
            'hasilKeputusan' => $this->faker->boolean(),
            'nasabah_id' => 1
        ];
    }
}
