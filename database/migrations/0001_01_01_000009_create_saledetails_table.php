<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateSaleDetailsTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_sale_id');
            $table->unsignedBigInteger('fk_stock_id');
            $table->string('stock_name', 200);
            $table->unsignedInteger('total_stock')->default(0);
            $table->unsignedInteger('sale_stock')->default(0);
            $table->decimal('unit', 10, 2)->default(0.00);
            $table->decimal('vat', 10, 2)->default(0.00);
            $table->decimal('tax', 10, 2)->default(0.00);
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('subtotal', 10, 2)->default(0.00);
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('fk_sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('fk_stock_id')->references('id')->on('stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_details');
    }
}