<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedClasificacionSabersTable extends Migration
{
    public function up()
    {
        Schema::create('sed_clasificacion_sabers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dane');
            $table->string('zona');
            $table->string('sector');
            $table->string('clasificacion');
            $table->integer('matriculas_3_ult');
            $table->integer('evaluados_3_ult');
            $table->float('indice_matematica', 15, 2);
            $table->float('indice_ciencias', 15, 2);
            $table->float('indice_sociales', 15, 2);
            $table->float('indice_lectura', 15, 2);
            $table->integer('indice_ingles');
            $table->string('indice_total');
            $table->date('fecha_corte')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
