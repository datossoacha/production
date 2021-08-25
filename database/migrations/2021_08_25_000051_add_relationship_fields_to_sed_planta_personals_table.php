<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSedPlantaPersonalsTable extends Migration
{
    public function up()
    {
        Schema::table('sed_planta_personals', function (Blueprint $table) {
            $table->unsignedBigInteger('comuna_id');
            $table->foreign('comuna_id', 'comuna_fk_3949578')->references('id')->on('comunas');
        });
    }
}
