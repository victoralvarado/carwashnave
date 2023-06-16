<?php

use Database\Seeders\ServiciosTableSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion_servicio');
            $table->enum('estado', ['a', 'i'])->default('a');
            $table->decimal('precio', 10, 2)->nullable();
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class' => 'ServiciosTableSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
