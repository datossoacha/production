<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReportesSgensTable extends Migration
{
    public function up()
    {
        Schema::table('reportes_sgens', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id', 'usuario_fk_3949437')->references('id')->on('users');
        });
    }
}
