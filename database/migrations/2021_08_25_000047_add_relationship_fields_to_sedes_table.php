<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSedesTable extends Migration
{
    public function up()
    {
        Schema::table('sedes', function (Blueprint $table) {
            $table->unsignedBigInteger('institucion_id');
            $table->foreign('institucion_id', 'institucion_fk_3949607')->references('id')->on('instituciones');
        });
    }
}
