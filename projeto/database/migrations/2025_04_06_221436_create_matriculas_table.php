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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->date('data_inicial');
            $table->date('data_final');
            $table->boolean('ativa')->default(true);
            
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('plano_id');

            $table->timestamps();

            
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plano_id')->references('id')->on('planos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
