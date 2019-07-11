<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_catalog_zone')->unsigned();// FOREING KEY ZONE
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->mediumText('contact')->nullable();
            $table->integer('phone')->nullable();
            $table->mediumText('address')->nullable();
            $table->enum('state', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamps();
            //RELACTIONS
            $table->foreign('id_catalog_zone')->references('id')->on('catalogues')
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
        Schema::dropIfExists('providers');
    }
}
