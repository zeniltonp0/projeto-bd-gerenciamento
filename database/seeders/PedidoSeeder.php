<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos')->insert([
            'data' => Carbon::now()->format('Y-m-d'),
            'cliente' => Str::random(10),
            'endereco' => Str::random(10),
            'quantidade' => 10,
            'status' => Arr::random(['Feito', 'Entregue', 'Pago']),
            'total' => 10.50
        ]);
    }
}
