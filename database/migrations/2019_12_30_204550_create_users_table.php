<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut',128)->nullable();//Buscar libreria para validar rut
            $table->string('email',128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',128);
            $table->string('name',128)->nullable();
            $table->string('state',128)->nullable();
            $table->string('country',128)->nullable();
            $table->enum('userType',['Administrador','Investigador'])->default('Investigador')->nullable();
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
