<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jurusanSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusans')->insert(['nama' => 'TI-MDI']);
        DB::table('jurusans')->insert(['nama' => 'TI-PAR']);
        DB::table('jurusans')->insert(['nama' => 'TI-KAB']);
        DB::table('jurusans')->insert(['nama' => 'TI-KAB']);
        DB::table('jurusans')->insert(['nama' => 'RSK']);
        DB::table('jurusans')->insert(['nama' => 'DKV']);
        DB::table('jurusans')->insert(['nama' => 'BD']);
    }
}
