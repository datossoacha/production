<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesSedusTable extends Migration
{
    public function up()
    {
        Schema::create('reportes_sedus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('codigo')->nullable();
            $table->date('fecha');
            $table->longText('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
