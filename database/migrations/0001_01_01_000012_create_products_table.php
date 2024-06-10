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
            $table->bigInteger('fk_brand_id')->unsigned()->nullable();
            $table->foreign('fk_brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->bigInteger('fk_model_id')->unsigned()->nullable();
            $table->foreign('fk_model_id')->references('id')->on('models')->onDelete('cascade');
            $table->unsignedBigInteger('fk_category_id')->nullable();
            $table->foreign('fk_category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('fk_subcategory_id')->nullable();
            $table->foreign('fk_subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->string('name', 200);
            $table->string('url_slug', 250);
            $table->string('image', 100)->nullable();
            $table->string('sku', 50)->nullable();
            $table->string('barcode', 50)->nullable();
            $table->string('unit', 20)->nullable();
            $table->text('size')->nullable();
            $table->text('color')->nullable();
            $table->text('specification')->nullable();
            $table->text('attribute')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'archive'])->default('active');
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