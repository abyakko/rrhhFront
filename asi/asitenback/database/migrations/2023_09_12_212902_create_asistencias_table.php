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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->date("fecha");

            $table->time("h_ingreso");
            $table->time("h_salida");

            $table->unsignedBigInteger("dia_id");
            $table->foreign("dia_id")->references("id")->on("dias")->onDelete("cascade");

            $table->unsignedBigInteger("turno_id");
            $table->foreign("turno_id")->references("id")->on("turnos")->onDelete("cascade");

            $table->unsignedBigInteger("observacion_id");
            $table->foreign("observacion_id")->references("id")->on("observacions")->onDelete("cascade");

            $table->unsignedBigInteger("multa_id");
            $table->foreign("multa_id")->references("id")->on("multas")->onDelete("cascade");
            
            $table->boolean("estadodeuda");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
