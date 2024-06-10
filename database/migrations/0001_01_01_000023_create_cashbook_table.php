<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashbookTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashbook', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_name', 100);
            $table->unsignedBigInteger('fk_reference_id');
            $table->text('description')->nullable();
            $table->decimal('in_amount', 10, 2)->nullable();
            $table->decimal('out_amount', 10, 2)->nullable();
            $this->addAuditColumns($table);
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
        Schema::dropIfExists('cashbook');
    }
}