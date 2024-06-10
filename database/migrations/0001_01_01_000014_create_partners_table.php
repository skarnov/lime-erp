<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreatePartnersTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->text('address')->nullable();
            $table->decimal('total_due', 10, 2)->default(0.00);
            $table->decimal('total_investment', 10, 2)->default(0.00);
            $table->decimal('total_profit', 10, 2)->default(0.00);
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('partners');
    }
}