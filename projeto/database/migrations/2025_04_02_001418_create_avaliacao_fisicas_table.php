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

            $table->float('altura_cliente')->default(0);
            $table->float('peso_cliente')->default(0);
            $table->date('data_marcada');
            $table->boolean('foi_realizada')->default(0);
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('avaliador_id');
            $table->foreign('avaliador_id')->references('id')->on('avaliadors')->onDelete('restrict');
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('restrict');
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
