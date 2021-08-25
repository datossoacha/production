<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSedTransportesTable extends Migration
{
    public function up()
    {
        Schema::table('sed_transportes', function (Blueprint $table) {
            $table->unsignedBigInteger('comuna_id')->nullable();
            $table->foreign('comuna_id', 'comuna_fk_3949652')->references('id')->on('comunas');
            $table->unsignedBigInteger('institucion_id')->nullable();
            $table->foreign('institucion_id', 'institucion_fk_3949653')->references('id')->on('instituciones');
            $table->unsignedBigInteger('sede_id')->nullable();
            $table->foreign('sede_id', 'sede_fk_3949654')->references('id')->on('sedes');
        });
    }
}
