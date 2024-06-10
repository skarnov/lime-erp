<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateSalesTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_name', 30);
            $table->unsignedBigInteger('fk_user_id')->nullable();
            $table->unsignedInteger('fk_partner_id')->nullable();
            $table->string('invoice_id', 30)->nullable();
            $table->text('description');
            $table->decimal('net_price', 10, 2)->default(0.00);
            $table->decimal('vat_amount', 10, 2)->default(0.00);
            $table->decimal('tax_amount', 10, 2)->default(0.00);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->decimal('grand_total', 10, 2)->default(0.00);
            $table->decimal('buy_price', 10, 2)->default(0.00);
            $table->decimal('sale_due', 10, 2)->default(0.00);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->tinyInteger('send_notification')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('sales');
    }
}