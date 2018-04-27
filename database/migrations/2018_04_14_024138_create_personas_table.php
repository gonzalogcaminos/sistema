<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->string('documento',50);
            $table->string('direccion',100);
            $table->string('mail',100);
            $table->string('area',200);
            $table->string('observacion',200)->nullable();
            $table->date('fecha');
            $table->boolean('condicion')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
