<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedRepitenciaTable extends Migration
{
    public function up()
    {
        Schema::create('sed_repitencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('poblacion');
            $table->integer('matricula');
            $table->float('repitencia', 15, 2);
            $table->date('fecha_corte');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
