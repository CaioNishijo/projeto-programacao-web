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
        Schema::create('horario__avaliadors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('avaliador_id');
            $table->foreign('avaliador_id')->references('id')->on('avaliador')->onDelete('restrict');

            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horario')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario__avaliadors');
    }
};
