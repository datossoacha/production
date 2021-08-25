<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedBiblioUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('sed_biblio_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sede_biblioteca')->nullable();
            $table->string('motivo_visita')->nullable();
            $table->string('grupo_etario')->nullable();
            $table->string('genero')->nullable();
            $table->string('tipo_poblacion')->nullable();
            $table->date('fecha_visita')->nullable();
            $table->integer('cantidad_asistentes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
