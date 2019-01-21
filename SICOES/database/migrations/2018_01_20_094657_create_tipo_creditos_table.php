<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_credito', function (Blueprint $table) {
            $table->increments('idtipocredito');
            $table->string('nombre')->required();
            $table->string('condicion',100)->nullable();
            //formato tipo decimal('nombre de campo',tamaño, precision)
            $table->decimal('monto',8, 2);
            $table->decimal('interes',8, 4)->required();
            $table->string('estado',20)->nullable();
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
        Schema::drop('tipo_credito');
    }
}
