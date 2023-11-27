<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS CambiaEstado";
        DB::unprepared($procedure);
        
        $procedure = "
        CREATE PROCEDURE CambiaEstado()
        BEGIN
        UPDATE convenios SET estado = '0' where f_fin <= CURDATE();
        END;
    ";

    DB::unprepared($procedure);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('CambiaEstado');
    }
};
