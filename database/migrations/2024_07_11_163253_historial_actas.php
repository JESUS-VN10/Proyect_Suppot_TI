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
        Schema::create('historial_actas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_acta')->nullable(true);
            $table->string('ruta_pdf')->nullable(true);
            // Foranea de Gestor
            $table->unsignedBigInteger('fk_id_gestor');
            $table->foreign('fk_id_gestor')->references('id')->on('gestores')->onDelete('cascade');
            // Foranea de Campaña (Operacion) 
            $table->unsignedBigInteger('fk_id_camp')->nullable(true);
            $table->foreign('fk_id_camp')->references('id')->on('camps')->onDelete('cascade');
            $table->date('fecha_creacion');
            $table->string('numero_caso')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('historial_actas');
    }
};
