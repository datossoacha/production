<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedCalificacionDocentesTable extends Migration
{
    public function up()
    {
        Schema::create('sed_calificacion_docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dane');
            $table->string('zona');
            $table->string('cargo');
            $table->string('area');
            $table->float('calificacion', 15, 2);
            $table->string('valoracion');
            $table->integer('vigencia');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
