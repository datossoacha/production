<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSedClasificacionSabersTable extends Migration
{
    public function up()
    {
        Schema::table('sed_clasificacion_sabers', function (Blueprint $table) {
            $table->unsignedBigInteger('comuna_id');
            $table->foreign('comuna_id', 'comuna_fk_3949674')->references('id')->on('comunas');
        });
    }
}
