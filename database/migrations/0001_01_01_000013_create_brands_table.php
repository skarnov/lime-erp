<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Migrations\AuditableMigration;

class CreateBrandsTable extends AuditableMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fk_brand_id')->nullable()->comment('For Model');
            $table->unsignedBigInteger('serial')->nullable();
            $table->string('name', 100)->comment('Name Or Model');
            $table->string('url_slug', 100);
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
        Schema::dropIfExists('brands');
    }
}