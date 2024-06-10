<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateIncomesTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_name', 100)->nullable();
            $table->unsignedBigInteger('fk_transaction_id');
            $table->text('description');
            $table->decimal('amount', 10, 2)->default(0.00);
            $this->addAuditColumns($table);
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
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['fk_transaction_id']);
        });

        Schema::dropIfExists('incomes');
    }
}