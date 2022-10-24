<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name_product')->comment('Nombre del producto');
            $table->string('reference')->comment('Referencia del producto');
            $table->integer('price')->comment('Precio del producto');
            $table->integer('weight')->comment('Peso del producto');
            $table->string('category')->comment('Categoría del producto');
            $table->integer('stock')->comment('Cantidad del producto en bodega');
            $table->timestamps();
            $table->softDeletes();
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
