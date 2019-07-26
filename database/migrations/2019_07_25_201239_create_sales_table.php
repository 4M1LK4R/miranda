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
            $table->unsignedBigInteger('client_id'); //cliente
            $table->unsignedBigInteger('slller_id'); //vendedor
            $table->unsignedBigInteger('user_id'); //usuario
            $table->decimal('total_to_pay');


            $table->decimal('discount');
            $table->enum('state', ['PENDIENTE','EN PROCESO','CANCELADO'])->default('PENDIENTE'); // estado
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
        Schema::dropIfExists('sales');
    }
}
