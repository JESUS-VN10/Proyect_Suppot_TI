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
        //
        Schema::create('gestores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cedula');
            $table->string('nombre_gestor');
            $table->string('correo');
            $table->string('password')->nullable(true);
            $table->string('rol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestores');
    }
};
