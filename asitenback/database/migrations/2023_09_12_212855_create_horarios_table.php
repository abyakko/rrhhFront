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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger("dia_id");
            $table->foreign("dia_id")->references("id")->on("dias")->onDelete("cascade");

            $table->unsignedBigInteger("turno_id");
            $table->foreign("turno_id")->references("id")->on("turnos")->onDelete("cascade");

            $table->unsignedBigInteger("usuario_id");
            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");

            $table->boolean("estado");

            $table->time("h_ingreso");
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
