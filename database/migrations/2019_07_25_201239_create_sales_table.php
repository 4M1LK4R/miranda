<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date'); // fecha de registro
            $table->decimal('total');
            $table->unsignedBigInteger('client_id')->unsigned(); //cliente
            $table->unsignedBigInteger('seller_id')->unsigned(); //vendedor
            $table->Integer('user_id'); //usuario

            $table->decimal('discount')->nullable();
            $table->date('expiration_discount')->nullable();// fecha de espiración del descuento
            $table->enum('state', ['PENDIENTE','EN PROCESO','CANCELADO'])->default('PENDIENTE'); // estado
            $table->timestamps();

            //RELACTIONS

            $table->foreign('client_id')->references('id')->on('clients') //cliente
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('seller_id')->references('id')->on('sellers') //vendedor
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
        Schema::dropIfExists('sales');
    }
}
