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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table ->string('concepto',50);
            $table->decimal('valor',10,2);
            $table->timestamps();
            $table->foreignId('estudiante_id')            
            ->constrained('estudiantes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('asignatura_id')            
            ->constrained('asignaturas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
