<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jenjangSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenjangs')->insert(['nama' => 'SD']);
        DB::table('jenjangs')->insert(['nama' => 'SMP']);
        DB::table('jenjangs')->insert(['nama' => 'SMA']);
        DB::table('jenjangs')->insert(['nama' => 'Universitas']);
        DB::table('jenjangs')->insert(['nama' => 'TK']);
    }
}
