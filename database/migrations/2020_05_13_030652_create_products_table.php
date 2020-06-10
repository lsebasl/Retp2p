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
            $table->bigIncrements('id');
            $table->string('barcode');
            $table->string('name');
            $table->enum('category',['Computers','Tv & Video','Smartphones','Accessories']);
            $table->string('model');
            $table->string('mark');
            $table->string('description');
            $table->integer('units');
            $table->string('price');
            $table->string('discount');
            $table->enum('status',['Enable','Disable',]);
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
