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
            $table->text('name',255);
            $table->text('description');
            $table->text('sku',50);
            $table->integer('quantity');
            $table->integer('category_id');
            $table->decimal('price_original',10,2);
            $table->decimal('price',10,2);
            $table->decimal('density',10,2);
            $table->decimal('sheetcost',10,2);
            $table->decimal('spare',10,2);
            $table->string('status',1);
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
