<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedPlantaPersonalsTable extends Migration
{
    public function up()
    {
        Schema::create('sed_planta_personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('establecimiento_datos');
            $table->string('dane');
            $table->string('area_formacion');
            $table->string('nivel_educativo');
            $table->string('area_dicta');
            $table->integer('vigencia');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
