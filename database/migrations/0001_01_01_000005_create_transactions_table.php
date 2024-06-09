<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->enum('type', ['user_fund', 'partner_investment', 'stock_in', 'stock_out', 'sale']);
            $table->unsignedBigInteger('fk_reference_id');
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->decimal('paid_amount', 10, 2)->default(0.00);
            $table->decimal('due_amount', 10, 2)->default(0.00);
            $table->dateTime('created_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->dateTime('modified_at')->nullable();
            $table->unsignedInteger('modified_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();

            $table->index('fk_reference_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}