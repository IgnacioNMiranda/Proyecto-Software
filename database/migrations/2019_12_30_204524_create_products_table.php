<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',128);
            $table->mediumText('description')->nullable();
            $table->date('date');
            $table->string('slug',128)->unique();

            
            $table->bigInteger('investigationGroupId')->unsigned();
            $table->bigInteger('projectId')->unsigned();
            
            $table->foreign('investigationGroupId')->references('id')->on('investigation_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('projectId')->references('id')->on('projects')
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
        Schema::dropIfExists('products');
    }
}
