<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatriculaMunicipalsTable extends Migration
{
    public function up()
    {
        Schema::table('matricula_municipals', function (Blueprint $table) {
            $table->unsignedBigInteger('comuna_id')->nullable();
            $table->foreign('comuna_id', 'comuna_fk_4668222')->references('id')->on('comunas');
        });
    }
}
