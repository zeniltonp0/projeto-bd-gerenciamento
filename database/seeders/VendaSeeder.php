<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendas')->insert([
            'data' => Carbon::now()->format('Y-m-d'),
            'cliente' => Str::random(10),
            'produto' => Str::random(10),
            'quantidade' => 2,
            'forma-pagamento' => 'pix'
        ]);
    }
}
