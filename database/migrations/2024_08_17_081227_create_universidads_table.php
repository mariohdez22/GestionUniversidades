<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('universidad', function (Blueprint $table) {
            $table->id('idUniversidad');
            $table->string('nombreUniversidad');
            $table->string('Direccion');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('estadoestudiante', function (Blueprint $table) {
            $table->id('idEstadoEstudiante');
            $table->string('estadoEstudiante');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('estudiante', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->foreignId('idUniversidad')->constrained( table: 'universidad', column: 'idUniversidad', indexName: 'idUniversidad')->onDelete('cascade');
            $table->foreignId('idEstadoEstudiante')->constrained( table: 'estadoestudiante', column: 'idEstadoEstudiante', indexName: 'idEstadoEstudiante')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universidad');
        Schema::dropIfExists('estadoestudiante');
        Schema::dropIfExists('estudiante');
    }
};
