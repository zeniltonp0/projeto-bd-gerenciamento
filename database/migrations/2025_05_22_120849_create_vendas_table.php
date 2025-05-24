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
        // Schema::create('vendas', function (Blueprint $table) {
        //     $table->id();
        //     $table->dateTime('data', precision: 0)->format('Y-m-d');
        //     $table->string('cliente', length: 50);
        //     $table->string('produto', length: 50);
        //     $table->integer('quantidade')->unsigned();
        //     $table->string('forma-pagamento', length: 100);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
