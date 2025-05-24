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
        // Schema::create('funcionarios', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nome', length: 100);
        //     $table->decimal('diaria', total: 8, places: 2);
        //     $table->integer('dias_trabalhados');
        //     $table->decimal('salario', total: 8, places: 2);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
