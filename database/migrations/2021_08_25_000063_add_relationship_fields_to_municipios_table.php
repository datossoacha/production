<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMunicipiosTable extends Migration
{
    public function up()
    {
        Schema::table('municipios', function (Blueprint $table) {
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'departamento_fk_3949422')->references('id')->on('departamentos');
        });
    }
}
