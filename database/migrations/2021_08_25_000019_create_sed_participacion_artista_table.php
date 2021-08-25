<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedParticipacionArtistaTable extends Migration
{
    public function up()
    {
        Schema::create('sed_participacion_artista', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_artista');
            $table->string('nombre_festival');
            $table->date('fecha_inicial')->nullable();
            $table->date('fecha_final')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
