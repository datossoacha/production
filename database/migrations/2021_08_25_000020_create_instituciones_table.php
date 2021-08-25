<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesTable extends Migration
{
    public function up()
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sector');
            $table->string('nombre_institucion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
