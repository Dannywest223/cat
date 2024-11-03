<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Product name
            $table->text('description'); // Product description
            $table->decimal('price', 8, 2); // Product price with two decimal places
            $table->integer('stock'); // Available stock
            $table->string('image'); // Image path for the product
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('products'); // Drop the products table if it exists
    }
}
