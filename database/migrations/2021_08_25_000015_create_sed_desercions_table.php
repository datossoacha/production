<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedDesercionsTable extends Migration
{
    public function up()
    {
        Schema::create('sed_desercions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matricula_aplicable');
            $table->integer('retiros');
            $table->float('desercion', 15, 2);
            $table->string('fecha_corte');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
