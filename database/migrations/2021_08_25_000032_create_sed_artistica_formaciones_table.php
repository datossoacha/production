<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedArtisticaFormacionesTable extends Migration
{
    public function up()
    {
        Schema::create('sed_artistica_formaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('area_formacion')->nullable();
            $table->string('categoria')->nullable();
            $table->integer('atendidos')->nullable();
            $table->integer('vigencia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
