<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_brand_id')->nullable();
            $table->unsignedBigInteger('fk_model_id')->nullable();
            $table->unsignedInteger('fk_category_id')->nullable();
            $table->unsignedInteger('fk_subcategory_id')->nullable();
            $table->string('name', 200);
            $table->string('url_slug', 250);
            $table->string('image', 100)->nullable();
            $table->string('batch', 100)->nullable();
            $table->string('lot', 100)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->decimal('buy_amount', 10, 2)->nullable();
            $table->decimal('sale_amount', 10, 2)->nullable();
            $table->string('sku', 50)->nullable();
            $table->string('barcode', 50)->nullable();
            $table->string('unit', 20)->nullable();
            $table->text('size')->nullable();
            $table->text('color')->nullable();
            $table->text('specification')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['product', 'service'])->nullable();
            $table->enum('status', ['active', 'inactive', 'archive'])->default('active');
            $table->dateTime('created_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->dateTime('modified_at')->nullable();
            $table->unsignedInteger('modified_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}