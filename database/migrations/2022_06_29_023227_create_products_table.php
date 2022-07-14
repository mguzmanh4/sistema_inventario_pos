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
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('sku')->from(1000001)->nullable();
            // $table->decimal('price', 15, 2)->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();
            $table->decimal('utility', 15, 2)->nullable();
            $table->integer('stock')->nullable();
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
