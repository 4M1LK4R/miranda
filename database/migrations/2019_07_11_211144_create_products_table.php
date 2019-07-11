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
            $table->unsignedBigInteger('id_catalog_product')->unsigned();// FOREING KEY ZONE TYPE PRODUCT
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->enum('state', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamps();
            //RELACTIONS
            $table->foreign('id_catalog_product')->references('id')->on('catalogues')
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
        Schema::dropIfExists('products');
    }
}
