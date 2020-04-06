<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',128)->unique();
            $table->string('titleSecondLanguage',128)->unique()->nullable();
            $table->enum('publicationType',['Indexada','No Indexada'])->default('Indexada');
            $table->enum('publicationSubType',['WOS','SCOPUS','SCIELO','Otro Indice','CONGRESO','REVISTA'])->default('WOS');
            $table->string('type',128); //Revista o Acta

            $table->date('date');

            $table->string('slug',128)->default('title');

            $table->bigInteger('investigation_group_id')->unsigned();
            $table->bigInteger('project_id')->unsigned()->nullable();

            $table->foreign('investigation_group_id')->references('id')->on('investigation_groups')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::dropIfExists('publications');
    }
}
