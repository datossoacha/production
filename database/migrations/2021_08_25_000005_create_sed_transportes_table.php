<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedTransportesTable extends Migration
{
    public function up()
    {
        Schema::create('sed_transportes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zona')->nullable();
            $table->string('grado')->nullable();
            $table->integer('beneficiarios')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
