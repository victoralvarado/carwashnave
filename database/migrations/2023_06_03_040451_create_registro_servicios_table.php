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
        Schema::create('registro_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servicio_diario_id');
            $table->foreign('servicio_diario_id')->references('id')->on('servicio_diarios');
            $table->string('descripcion_servicio_realizado');
            $table->string('comentarios')->nullable();
            $table->enum('estado', ['a', 'i'])->default('a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_servicios');
    }
};
