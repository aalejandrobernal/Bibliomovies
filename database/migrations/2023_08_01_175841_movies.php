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
        Schema :: create ('movies', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('audiencia');
            $table->string('publico');
            $table->string('tipo_material');
            $table->string('descripcion');
            $table->string('categoria');
            $table->string('topografico');
            $table->string('img');
            $table->string('trailer');
            $table->string('user');
            $table->string('estado');
            // $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
