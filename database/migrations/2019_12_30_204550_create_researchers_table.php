<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut',128)->unique();//Buscar libreria para validar rut
            $table->string('name',128);
            $table->string('state',128);
            $table->string('country',128);

            $table->bigInteger('unit_id')->unsigned()->nullable();

            $table->timestamps();

            //Relación
            $table->foreign('unit_id')->references('id')->on('units')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researchers');
    }
}