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
        // Schema::create('materia_primas', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nome', length: 100);
        //     $table->integer('quantidade')->unsigned();
        //     $table->decimal('valor', total: 8, places: 2);
        //     $table->dateTime('data', precision: 0)->format('Y-m-d');
        //     $table->decimal('valor_total', total: 8, places: 2);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_primas');
    }
};
