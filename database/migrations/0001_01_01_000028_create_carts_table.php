<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateCartsTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_admin_id')->nullable();
            $table->unsignedBigInteger('fk_user_id')->nullable();
            $table->decimal('netTotal', 10, 2)->default(0.00);
            $table->decimal('vatTotal', 10, 2)->default(0.00);
            $table->decimal('taxTotal', 10, 2)->default(0.00);
            $table->decimal('discountTotal', 10, 2)->default(0.00);
            $table->decimal('grandTotal', 10, 2)->default(0.00);
            $table->decimal('buyTotal', 10, 2)->default(0.00);
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
        Schema::dropIfExists('carts');
    }
}