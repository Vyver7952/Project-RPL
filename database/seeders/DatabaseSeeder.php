<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Nasabah;
use App\Models\Simpanan;
use App\Models\Peminjaman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Nasabah::factory(100)->create();
        Simpanan::factory(50)->create();
        Peminjaman::factory(20)->create();

        User::factory()->create([
            'name' => 'Daniel Budi Prasetyo',
            'email' => '205314145@student.usd.ac.id',
            'username' => 'danielbudi',
            'password' => bcrypt('password'),
            'is_admin' => True
        ]);
        User::factory()->create([
            'name' => 'Herlambang Agung Sukmono',
            'email' => '205314147@student.usd.ac.id',
            'username' => 'herlambangagung',
            'password' => bcrypt('password'),
            'is_admin' => False
        ]);
        User::factory()->create([
            'name' => 'Jeanytha Gein',
            'email' => '205314153@student.usd.ac.id',
            'username' => 'jeanythagein',
            'password' => bcrypt('password'),
            'is_admin' => False
        ]);
        User::factory()->create([
            'name' => 'Patricia Dian Paska',
            'email' => '205314152@student.usd.ac.id',
            'username' => 'patriciadian',
            'password' => bcrypt('password'),
            'is_admin' => False
        ]);

        User::factory(50)->create();
    }
}
