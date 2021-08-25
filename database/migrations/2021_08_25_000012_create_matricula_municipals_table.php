<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaMunicipalsTable extends Migration
{
    public function up()
    {
        Schema::create('matricula_municipals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sector')->nullable();
            $table->string('institucion')->nullable();
            $table->string('sede')->nullable();
            $table->string('jornada')->nullable();
            $table->integer('grado_0')->nullable();
            $table->integer('grado_1')->nullable();
            $table->integer('grado_2')->nullable();
            $table->integer('grado_3')->nullable();
            $table->integer('grado_4')->nullable();
            $table->integer('grado_5')->nullable();
            $table->integer('grado_6')->nullable();
            $table->integer('grado_7')->nullable();
            $table->integer('grado_8')->nullable();
            $table->integer('grado_9')->nullable();
            $table->integer('grado_10')->nullable();
            $table->integer('grado_11')->nullable();
            $table->integer('grado_22')->nullable();
            $table->integer('grado_23')->nullable();
            $table->integer('grado_24')->nullable();
            $table->integer('grado_25')->nullable();
            $table->integer('grado_99')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
