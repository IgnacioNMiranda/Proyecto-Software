<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',128)->nullable();
            $table->string('name',128);
            $table->enum('state', ['Postulado','En ejecucion','Aceptado','Cancelado'])->default('Postulado');
            $table->date('startDate');
            $table->date('endDate')->nullable();
            $table->string('slug',128)->unique();

            
            $table->bigInteger('investigationGroupId')->unsigned();
            
            $table->foreign('investigationGroupId')->references('id')->on('investigation_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
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
        Schema::dropIfExists('projects');
    }
}
