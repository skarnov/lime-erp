<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_name', 100)->nullable();
            $table->unsignedBigInteger('fk_transaction_id');
            $table->text('description');
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->dateTime('modified_at')->nullable();
            $table->unsignedInteger('modified_by')->nullable();
            $table->softDeletes();

            // Add foreign key constraint
            $table->foreign('fk_transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('incomes', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['fk_transaction_id']);
        });

        Schema::dropIfExists('incomes');
    }
}