<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_catalog_zone')->unsigned();// FOREING KEY ZONE
            $table->unsignedBigInteger('id_catalog_client')->unsigned();// FOREING KEY  CLIENT TYPE
            $table->integer('nit')->unique();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->integer('phone')->nullable();
            $table->mediumText('address')->nullable();
            $table->enum('state', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamps();
            //RELACTIONS
            $table->foreign('id_catalog_zone')->references('id')->on('catalogues')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_catalog_client')->references('id')->on('catalogues')
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
        Schema::dropIfExists('clients');
    }
}
