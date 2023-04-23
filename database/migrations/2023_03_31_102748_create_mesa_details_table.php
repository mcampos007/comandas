<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_details', function (Blueprint $table) {
            $table->Increments('id');

            $table->integer('mesa_id')->unsigned()->nullable();
            $table->foreign('mesa_id')->references('id')->on('mesas');

            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');

            $table->float('quantity');

            $table->string('status', 1)->default('0'); //0->Pendiente de Facturar  1->Pasado a Facturacion 3->Facturado

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
        Schema::dropIfExists('mesa_details');
    }
}
