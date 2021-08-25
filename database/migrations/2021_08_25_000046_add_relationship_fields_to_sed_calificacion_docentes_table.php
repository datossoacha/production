<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSedCalificacionDocentesTable extends Migration
{
    public function up()
    {
        Schema::table('sed_calificacion_docentes', function (Blueprint $table) {
            $table->unsignedBigInteger('institucion_id');
            $table->foreign('institucion_id', 'institucion_fk_3949638')->references('id')->on('instituciones');
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'sede_fk_3949639')->references('id')->on('sedes');
            $table->unsignedBigInteger('comuna_id');
            $table->foreign('comuna_id', 'comuna_fk_3949641')->references('id')->on('comunas');
        });
    }
}
