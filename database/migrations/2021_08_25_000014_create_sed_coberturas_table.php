<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedCoberturasTable extends Migration
{
    public function up()
    {
        Schema::create('sed_coberturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('poblacion');
            $table->integer('poblacion_edad_escolar');
            $table->integer('matricula');
            $table->float('cobertura_bruta', 15, 2);
            $table->string('cobertura_neta');
            $table->date('fecha_corte')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
