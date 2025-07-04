<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('matriculas', function (Blueprint $table) {
        $table->date('data_pagamento')->nullable();
       $table->boolean('status_pagamento')->default(0);

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matriculas', function (Blueprint $table) {
            //
        });
    }
};
