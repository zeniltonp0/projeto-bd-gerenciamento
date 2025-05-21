<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data', precision: 0)->format('Y-m-d');
            $table->string('cliente', length: 50);
            $table->string('endereco', length: 100);
            $table->integer('quantidade')->unsigned();
            $table->enum('status', ['feito', 'entregue', 'pago']);
            $table->decimal('total', total: 8, places: 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
