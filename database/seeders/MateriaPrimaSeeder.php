<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MateriaPrimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materia_primas')->insert([
            'nome' => Str::random(10),
            'quantidade' => 10,
            'valor' => 100.0,
            'data' => Carbon::now()->format('Y-m-d'),
            'valor_total' => 1000.0
        ]);
    }
}
