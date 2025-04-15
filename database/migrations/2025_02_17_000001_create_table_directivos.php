<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('directivos_campanas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 20)->unique();
            $table->string('nombre_director', 100);
            $table->string('correo', 150)->unique();
            $table->boolean('usuario_activo')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('directivos_campanas');
    }
};
