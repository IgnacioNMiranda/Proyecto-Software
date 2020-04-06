<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationResearcherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_researcher', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('publication_id')->unsigned();
            $table->bigInteger('researcher_id')->unsigned();


            $table->foreign('publication_id')->references('id')->on('publications')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('researcher_id')->references('id')->on('researchers')
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
        Schema::dropIfExists('publication_researcher');
    }
}
