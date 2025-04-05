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
        Schema::create('avaliacao_fisicas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->float('altura_cliente');
            $table->float('peso_cliente');
            $table->dateTime('data_marcada');
            $table->boolean('foi_realizada')->default('false');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_fisicas');
    }
};
