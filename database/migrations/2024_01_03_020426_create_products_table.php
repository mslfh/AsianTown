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

            $table->string('main_name');
            $table->string('chinese_name')->nullable();

            $table->string('barcode')->nullable();

            $table->text('image_url')->nullable();
            $table->text('image_url_exp')->nullable();

            $table->integer('status')->default(0); //1-active, 0-inactive, 2-deleted

            $table->integer('type')->nullable();//1-店售 2-仓库 3-店售+仓库

            $table->integer('category_id')->nullable();
            $table->string('category')->nullable();

            $table->string('brand')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('unit')->nullable();

            $table->text('description')->nullable();
            $table->decimal('basic_price', 8, 2)->nullable();
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
