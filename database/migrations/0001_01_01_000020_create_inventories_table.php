<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateInventoriesTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_brand_id')->unsigned()->nullable();
            $table->foreign('fk_brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->bigInteger('fk_model_id')->unsigned()->nullable();
            $table->foreign('fk_model_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('fk_category_id')->nullable();
            $table->foreign('fk_category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('fk_subcategory_id')->nullable();
            $table->foreign('fk_subcategory_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('fk_partner_id')->nullable();
            $table->foreign('fk_partner_id')->references('id')->on('partners')->onDelete('cascade');
            $table->string('name', 200);
            $table->string('url_slug', 250);
            $table->string('image', 100)->nullable();
            $table->string('sku', 50)->nullable();
            $table->string('barcode', 50)->nullable();
            $table->string('unit', 20)->nullable();
            $table->text('size')->nullable();
            $table->text('color')->nullable();
            $table->text('specification')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['product', 'service']);
            $table->enum('status', ['active', 'inactive', 'archive'])->default('active');
            $table->index('fk_brand_id');
            $table->index('fk_model_id');
            $table->index('fk_category_id');
            $table->index('fk_subcategory_id');
            $table->index('fk_partner_id');
            $this->addAuditColumns($table);
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
        Schema::dropIfExists('inventories');
    }
}