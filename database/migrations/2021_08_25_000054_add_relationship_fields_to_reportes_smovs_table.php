<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReportesSmovsTable extends Migration
{
    public function up()
    {
        Schema::table('reportes_smovs', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id', 'usuario_fk_3949502')->references('id')->on('users');
        });
    }
}
