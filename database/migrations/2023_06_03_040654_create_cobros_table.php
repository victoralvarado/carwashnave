<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicio_diario_id');
            $table->foreign('servicio_diario_id')->references('id')->on('servicios_diarios');
            $table->decimal('monto_cobro', 8, 2);
            $table->dateTime('fecha_hora_cobro');
            $table->enum('estado', ['a', 'i'])->default('a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobros');
    }
};