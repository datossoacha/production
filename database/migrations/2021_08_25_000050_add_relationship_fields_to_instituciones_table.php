<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInstitucionesTable extends Migration
{
    public function up()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->unsignedBigInteger('comuna_id')->nullable();
            $table->foreign('comuna_id', 'comuna_fk_3949597')->references('id')->on('comunas');
        });
    }
}
