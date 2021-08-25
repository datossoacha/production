<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadaSedePivotTable extends Migration
{
    public function up()
    {
        Schema::create('jornada_sede', function (Blueprint $table) {
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'sede_id_fk_3949612')->references('id')->on('sedes')->onDelete('cascade');
            $table->unsignedBigInteger('jornada_id');
            $table->foreign('jornada_id', 'jornada_id_fk_3949612')->references('id')->on('jornadas')->onDelete('cascade');
        });
    }
}
