<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'nim'               => fake()->randomNumber(6, false),
            'nama'              => fake()->name(),
            'jenis_kelamin'     => fake()->randomElement(['LAKI-LAKI', 'PEREMPUAN']),
            'alamat'            => fake()->state(),
            'tanggal_lahir'     => fake()->date('Y-m-d'),
            'jurusan_id'           => 1,
            'tahun_angkatan'    => fake()->date('Y'),
        ]);
    }
}
