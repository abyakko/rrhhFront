<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->Integer('numero')->unique();
            $table->Date('f_inicio');
            $table->String('codigo');
            $table->Boolean('estado');
            $table->String('observacion')->nullable();

           $table->unsignedBigInteger('cliente_id');
           $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('campana_id');
            $table->foreign('campana_id')->references('id')->on('campanas')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjetas');
    }
};
