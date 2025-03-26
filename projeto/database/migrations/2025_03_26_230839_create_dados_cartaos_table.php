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
        Schema::create('dados_cartaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('numero');
            $table->date('data_validade');
            $table->int('cvv');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dados_cartaos');
    }
};
