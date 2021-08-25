<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedRecursosTable extends Migration
{
    public function up()
    {
        Schema::create('sed_recursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('area');
            $table->float('asignados', 15, 2);
            $table->float('ejecutados', 15, 2);
            $table->float('ejecucion', 15, 2)->nullable();
            $table->integer('vigencia');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
