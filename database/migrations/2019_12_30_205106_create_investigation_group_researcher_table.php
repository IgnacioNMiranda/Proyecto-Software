<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationGroupResearcherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_group_researcher', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('researcher_id')->unsigned();
            $table->bigInteger('investigation_group_id')->unsigned();

            $table->foreign('researcher_id')->references('id')->on('researchers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('investigation_group_id')->references('id')->on('investigation_groups')
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
        Schema::dropIfExists('investigation_group_researcher');
    }
}
