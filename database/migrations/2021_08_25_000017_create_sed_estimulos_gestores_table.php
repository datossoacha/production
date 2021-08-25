<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedEstimulosGestoresTable extends Migration
{
    public function up()
    {
        Schema::create('sed_estimulos_gestores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('linea_participacion');
            $table->string('proyecto')->nullable();
            $table->string('estado');
            $table->date('fecha_presentacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
